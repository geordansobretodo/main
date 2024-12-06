<script>
    let map;

    function initMap(keywords) {
      // Initialize the map
      map = new google.maps.Map(document.getElementById("map"), {
        center: {
          lat: 12.8797,
          lng: 121.7740
        }, // Default to Philippines
        zoom: 6, // Adjust zoom level for a regional view
      });

      const geocoder = new google.maps.Geocoder();
      const bounds = new google.maps.LatLngBounds(); // To adjust map bounds dynamically

      // Loop through destinations and create markers
      keywords.forEach((keyword) => {
        geocodeDestination(geocoder, keyword, bounds);
      });
    }

    function geocodeDestination(geocoder, keyword, bounds) {
      geocoder.geocode({
        address: keyword
      }, (results, status) => {
        if (status === "OK") {
          const location = results[0].geometry.location;

          // Add marker for each destination
          const marker = new google.maps.Marker({
            map: map,
            position: location,
            title: keyword, // Tooltip when hovering over the marker
          });

          // Extend map bounds to include this location
          bounds.extend(location);
          map.fitBounds(bounds); // Adjust map to fit all markers
        } else {
          console.error("Geocode was not successful for the following reason: " + status);
        }
      });
    }

    document.getElementById('preferenceForm').addEventListener('submit', async function(event) {
      event.preventDefault();

      const province = document.getElementById('province').value;
      const country = document.getElementById('country').value;
      const currentloc = document.getElementById('currentLoc').value;
      const place = document.querySelector('input[name="place"]:checked')?.value;

      if (!place) {
        alert('Please select a place.');
        return;
      }

      // Construct the prompt
      const prompt = `User prefers a ${place} strictly only located in ${province}, ${country}. Give a list of possible destinations near ${currentloc}. Give me at least 5 destinations.`;

      console.log('Constructed Prompt:', prompt);

      async function fetchWithRetry(prompt, retries = 3, delay = 2000) {
        for (let attempt = 1; attempt <= retries; attempt++) {
          try {
            const response = await fetch('https://api.openai.com/v1/chat/completions', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Authorization': '' // Replace with your actual API key
              },
              body: JSON.stringify({
                model: 'gpt-4o-mini',
                messages: [{
                  role: 'user',
                  content: prompt
                }],
                max_tokens: 150
              })
            });

            if (response.status === 429) { // Too many requests
              if (attempt < retries) {
                console.warn(`Rate limit hit. Retrying in ${delay}ms...`);
                await new Promise(res => setTimeout(res, delay)); // Wait before retry
                delay *= 2; // Exponential increase in delay
                continue;
              } else {
                throw new Error('Rate limit exceeded after multiple attempts.');
              }
            }

            const data = await response.json();
            return data;

          } catch (error) {
            console.error('Fetch attempt failed:', error);
            if (attempt === retries) throw error;
          }
        }
      }

      // In your form submission handler:
      try {
        const data = await fetchWithRetry(prompt);
        const result = data.choices?.[0]?.message?.content;
        // document.getElementById('output').innerText = result || 'No response from API';
        if (result) {
          // Extract keywords
          const keywords = result.match(/\*\*(.*?)\*\*/g)?.map(keyword => keyword.replace(/\*\*/g, '')) || [];

          // Store the keywords in a variable for later use
          const extractedKeywords = keywords;

          // Display the extracted keywords in the HTML
          document.getElementById('output').innerHTML =
            extractedKeywords.length > 0 ?
            `Extracted Keywords: 
              <ul>${extractedKeywords.map(kw => `<li>${kw}</li>`).join('')}</ul>` :
            'No keywords found.';

          if (extractedKeywords.length > 0) {
            initMap(extractedKeywords);
          }
        } else {
          document.getElementById('output').innerText = 'No response from API';
        }
      } catch (error) {
        document.getElementById('output').innerText = 'An error occurred. Please try again later.';
      }
    });
  </script>

  <!-- Google Maps API -->
  <script src="" async defer></script>