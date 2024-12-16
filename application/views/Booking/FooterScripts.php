<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('preferenceForm').addEventListener('submit', async function(event) {
      event.preventDefault();

      const province = document.getElementById('province').value;
      const country = document.getElementById('country').value;
      const place = document.getElementById('place').value;
      const currentLoc = document.getElementById('currentLoc').value; // 'near me' or selected location
      const filters = document.getElementById('filters').value;
      
      document.getElementById('output').innerHTML = "Fetching destinations...";

      try {
        // Get current loc if 'near me'
        let userLocation = currentLoc.toLowerCase() === 'near me' ? await getCurrentLocation() : null;

        const apiKey = '';
        const apiUrl = userLocation
          ? `https://api.tripadvisor.com/api/v2/search?lat=${userLocation.coords.latitude}&lng=${userLocation.coords.longitude}&category=${place}&filters=${filters}&key=${apiKey}`
          : `https://api.tripadvisor.com/api/v2/search?query=${encodeURIComponent(province)}&category=${place}&filters=${filters}&key=${apiKey}`;

        const response = await fetch(apiUrl);
        if (!response.ok) {
          throw new Error(`API error: ${response.status}`);
        }

        const data = await response.json();
        
        // filter places by distance
        if (userLocation) {
          const nearbyPlaces = filterPlacesByDistance(userLocation.coords, data.results);
          displaySuggestions(nearbyPlaces);
          initMap(nearbyPlaces);
        } else {
          displaySuggestions(data.results);
          initMap(data.results);
        }

      } catch (error) {
        console.error('Error fetching suggestions:', error);
        alert('Unable to fetch suggestions. Please try again later.');
      }
    });
  });

  async function getCurrentLocation() {
    return new Promise((resolve, reject) => {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(resolve, reject);
      } else {
        reject(new Error("Geolocation is not supported by this browser."));
      }
    });
  }

  // filter places based on distance from current location
  function filterPlacesByDistance(userCoords, places) {
    const maxDistanceKm = 50; // Max distance in km
    return places.filter(place => {
      const placeCoords = {
        lat: place.latitude,
        lng: place.longitude
      };

      const distance = calculateDistance(userCoords, placeCoords); // Calculate distance between coordinates
      return distance <= maxDistanceKm;
    });
  }

  // haversine to calculate the distance between two points
  function calculateDistance(coords1, coords2) {
    const R = 6371; // r of Earth in km
    const lat1 = coords1.lat * Math.PI / 180;
    const lon1 = coords1.lng * Math.PI / 180;
    const lat2 = coords2.lat * Math.PI / 180;
    const lon2 = coords2.lng * Math.PI / 180;

    const dlat = lat2 - lat1;
    const dlng = lon2 - lon1;

    const a = Math.sin(dlat / 2) * Math.sin(dlat / 2) +
              Math.cos(lat1) * Math.cos(lat2) *
              Math.sin(dlng / 2) * Math.sin(dlng / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    const distance = R * c; // d in km
    return distance;
  }

  function displaySuggestions(places) {
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';

    if (places.length > 0) {
      places.forEach(place => {
        const placeElement = document.createElement('div');
        placeElement.innerHTML = `
          <h3>${place.name}</h3>
          <p>Rating: ${place.rating}</p>
          <p>${place.address}</p>
        `;
        resultsContainer.appendChild(placeElement);
      });
    } else {
      resultsContainer.innerText = 'No suggestions found nearby.';
    }
  }

  function initMap(places) {
    if (places.length === 0) {
      return;
    }

    const map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: places[0].latitude, lng: places[0].longitude },
      zoom: 12
    });

    places.forEach(place => {
      new google.maps.Marker({
        position: { lat: place.latitude, lng: place.longitude },
        map: map,
        title: place.name
      });
    });
  }

  function loadGoogleMapsAPI() {
    const script = document.createElement('script');
    script.src = "";
    script.async = true;
    script.defer = true;
    document.body.appendChild(script);
  }

  window.onload = loadGoogleMapsAPI;
</script>
