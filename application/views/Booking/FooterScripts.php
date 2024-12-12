<script>
  document.getElementById('preferenceForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    // Collect user input
    const userBudget = document.getElementById('budget').value;
    const category = document.getElementById('place').value;
    const location = document.getElementById('location').value;
    const filters = document.getElementById('filters').value;
    const budget = document.getElementById('budget').value;

    try {
      // Construct the API request URL
      const apiKey = '<?= $tripAd ?>';
      // const apiUrl = `https://api.tripadvisor.com/api/v2/search?query=${encodeURIComponent(location)}&category=${encodeURIComponent(category)}&filters=${encodeURIComponent(filters)}&key=${apiKey}`;
      if (location.toLowerCase() === 'near me') {
        navigator.geolocation.getCurrentPosition(position => {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          const apiUrl = `https://api.tripadvisor.com/api/v2/search?lat=${lat}&lng=${lng}&category=${category}&filters=${filters}&key=${apiKey}`;
          // Fetch suggestions using lat/lng
        });
      }


      // Fetch data from TripAdvisor API
      const response = await fetch(apiUrl);
      if (!response.ok) {
        throw new Error(`API error: ${response.status}`);
      }

      const data = await response.json();

      // Display results
      displaySuggestions(data);
      initMap(data);
    } catch (error) {
      console.error('Error fetching suggestions:', error);
      alert('Unable to fetch suggestions. Please try again later.');
    }
  });

  // Function to display suggestions on the page
  function displaySuggestions(data) {
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';
    const filteredResults = data.results.filter(place =>
      place.price_level <= userBudget
    );

    if (data.results && data.results.length > 0) {
      data.results.forEach(place => {
        const placeElement = document.createElement('div');
        placeElement.innerHTML = `
        <h3>${place.name}</h3>
        <p>Rating: ${place.rating}</p>
        <p>${place.address}</p>
      `;
        resultsContainer.appendChild(placeElement);
      });
    } else {
      resultsContainer.innerText = 'No suggestions found for your preferences.';
    }
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Request location access as soon as the page loads
    getLocation();
  });

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;

    const geocoder = new google.maps.Geocoder();
    const location = new google.maps.LatLng(lat, lng);

    geocoder.geocode({
      location
    }, (results, status) => {
      if (status === "OK") {
        if (results[0]) {
          const region = results[0].address_components.find(component =>
            component.types.includes("administrative_area_level_1")
          );
          const country = results[0].address_components.find(component =>
            component.types.includes("country")
          );

          if (region && country.short_name === "PH") {
            document.getElementById("nearbyOption").value = region.long_name;
            document.getElementById("nearbyOption").innerText = `Nearby (${region.long_name})`;
          } else {
            alert("Unable to identify region within the Philippines.");
          }
        } else {
          alert("No results found for this location.");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }

  function showError(error) {
    switch (error.code) {
      case error.PERMISSION_DENIED:
        alert("User denied the request for Geolocation.");
        break;
      case error.POSITION_UNAVAILABLE:
        alert("Location information is unavailable.");
        break;
      case error.TIMEOUT:
        alert("The request to get user location timed out.");
        break;
      case error.UNKNOWN_ERROR:
        alert("An unknown error occurred.");
        break;
    }
  }
</script>

<!-- <script>
  let map;

  function initMap(keywords) {
    const map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: userLat,
        lng: userLng
      },
      zoom: 12,
    });

    results.forEach(place => {
      new google.maps.Marker({
        position: {
          lat: place.latitude,
          lng: place.longitude
        },
        map: map,
        title: place.name,
      });
    });
  }

  const geocoder = new google.maps.Geocoder();
  const bounds = new google.maps.LatLngBounds(); // To adjust map bounds dynamically

  // Loop through destinations and create markers
  keywords.forEach((keyword) => {
    geocodeDestination(geocoder, keyword, bounds);
  });
  

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

  // document.getElementById('preferenceForm').addEventListener('submit', async function(event) {
  //   event.preventDefault();

  //   const province = document.getElementById('province').value;
  //   const country = document.getElementById('country').value;
  //   const currentloc = document.getElementById('currentLoc').value;
  //   const place = document.getElementById('place').value;

  //   const prompt = `User prefers a ${place} strictly only located in ${province}, ${country}. Give a list of possible destinations near ${currentloc}. Give me at least 5 destinations.`;

  //   async function fetchWithRetry(prompt, retries = 3, delay = 2000) {
  //     for (let attempt = 1; attempt <= retries; attempt++) {
  //       try {
  //         const response = await fetch('https://api.openai.com/v1/chat/completions', {
  //           method: 'POST',
  //           headers: {
  //             'Content-Type': 'application/json',
  //             'Authorization': '<?= $gpt ?>' // Replace with your actual API key
  //           },
  //           body: JSON.stringify({
  //             model: 'gpt-4o-mini',
  //             messages: [{
  //               role: 'user',
  //               content: prompt
  //             }],
  //             max_tokens: 150
  //           })
  //         });

  //         if (response.status === 429) { // Too many requests
  //           if (attempt < retries) {
  //             console.warn(`Rate limit hit. Retrying in ${delay}ms...`);
  //             await new Promise(res => setTimeout(res, delay)); // Wait before retry
  //             delay *= 2; // Exponential increase in delay
  //             continue;
  //           } else {
  //             throw new Error('Rate limit exceeded after multiple attempts.');
  //           }
  //         }

  //         const data = await response.json();
  //         return data;

  //       } catch (error) {
  //         console.error('Fetch attempt failed:', error);
  //         if (attempt === retries) throw error;
  //       }
  //     }
  //   }

  //   // In your form submission handler:
  //   try {
  //     const data = await fetchWithRetry(prompt);
  //     const result = data.choices?.[0]?.message?.content;
  //     // document.getElementById('output').innerText = result || 'No response from API';
  //     if (result) {
  //       // Extract keywords
  //       const keywords = result.match(/\*\*(.*?)\*\*/g)?.map(keyword => keyword.replace(/\*\*/g, '')) || [];

  //       // Store the keywords in a variable for later use
  //       const extractedKeywords = keywords;

  //       // Display the extracted keywords in the HTML
  //       document.getElementById('output').innerHTML =
  //         extractedKeywords.length > 0 ?
  //         `Extracted Keywords: 
  //             <ul>${extractedKeywords.map(kw => `<li>${kw}</li>`).join('')}</ul>` :
  //         'No keywords found.';

  //       if (extractedKeywords.length > 0) {
  //         initMap(extractedKeywords);
  //       }
  //     } else {
  //       document.getElementById('output').innerText = 'No response from API';
  //     }
  //   } catch (error) {
  //     document.getElementById('output').innerText = 'An error occurred. Please try again later.';
  //   }
  // });
</script> -->

<!-- Google Maps API -->
<script src="<?= $maps ?>" async defer></script>