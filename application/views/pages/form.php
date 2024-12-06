<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preference Form with OpenAI API</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/form_style.css') ?>">
</head>

<style>
  /* Importing Google Fonts - Poppins */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg, #e2eaff, #00098d);
  }

  .container {
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  }

  .container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }

  .container .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #e0f3ff, #001dd6);
  }

  .content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }

  form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }

  form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }

  .user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }

  .user-details .input-box input:focus,
  .user-details .input-box input:valid {
    border-color: #9b59b6;
  }

  form .place-details .place-title {
    font-size: 20px;
    font-weight: 500;
  }

  form .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
  }

  form .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  form .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
  }

  #dot-1:checked~.category label .one,
  #dot-2:checked~.category label .two,
  #dot-3:checked~.category label .three {
    background: #9b59b6;
    border-color: #d9d9d9;
  }

  form input[type="radio"] {
    display: none;
  }

  form .button {
    height: 45px;
    margin: 35px auto;
    /* Center the button horizontally */
    width: 50%;
    /* Make the button narrower */
    display: flex;
    /* Ensure centering within its container */
    justify-content: center;
    /* Center the button */
  }

  form .button input {
    width: 150px;
    /* Set a fixed width for the button */
    height: 100%;
    /* Maintain button height */
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    background: linear-gradient(135deg, #d0ceed, #02006e);
    /* Base color */
    transition: all 0.3s ease;
  }

  /* Remove hover color effect */
  form .button input:hover {
    background: linear-gradient(135deg, #d0ceed, #02006e);
    /* Same as normal state */
  }


  /* Responsive media query code for mobile devices */
  @media(max-width: 584px) {
    .container {
      max-width: 100%;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: 100%;
    }

    form .category {
      width: 100%;
    }

    .content form .user-details {
      max-height: 300px;
      overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
      width: 5px;
    }
  }

  /* Responsive media query code for mobile devices */
  @media(max-width: 459px) {
    .container .content .category {
      flex-direction: column;
    }
  }
</style>

<body>
  <div class="container">
    <div class="title">What's on your mind?</div>
    <div class="content">
      <form id="preferenceForm">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Province</span>
            <input type="text" id="province" placeholder="Enter province" required>
          </div>
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" id="country" placeholder="Enter country" value="Philippines" disabled required>
          </div>
          <div class="input-box">
            <span class="details">My Location</span>
            <input type="text" id="currentLoc" placeholder="Saan?" required>
          </div>
        </div>
        <div class="place-details">
          <input type="radio" name="place" id="dot-1" value="Private Pool">
          <input type="radio" name="place" id="dot-2" value="Beach">
          <input type="radio" name="place" id="dot-3" value="Waterfall">
          <span class="place-title">Place</span>
          <div class="category">
            <label for="dot-1"><span class="dot one"></span><span class="place">Private Pool</span></label>
            <label for="dot-2"><span class="dot two"></span><span class="place">Beach</span></label>
            <label for="dot-3"><span class="dot three"></span><span class="place">Waterfall</span></label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Go">
        </div>
      </form>
      <!-- Placeholder for displaying OpenAI API response -->
      <div id="output" style="margin-top: 20px; padding: 30px; background-color: #f0f0f0; border-radius: 5px;"></div>
      <div id="map" style="height: 150px; width: 100%;"></div>
    </div>
  </div>

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

</body>

</html>