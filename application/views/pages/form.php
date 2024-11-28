<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preference Form with OpenAI API</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/form_style.css') ?>">
</head>
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
            <input type="text" id="country" placeholder="Enter country" required>
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
    </div>
  </div>

  <script>
      document.getElementById('preferenceForm').addEventListener('submit', async function(event) {
      event.preventDefault();

      const province = document.getElementById('province').value;
      const country = document.getElementById('country').value;
      const place = document.querySelector('input[name="place"]:checked')?.value;

      if (!place) {
        alert('Please select a place.');
        return;
      }

      // Construct the prompt
      const prompt = `User prefers a ${place} in ${province}, ${country}. Give a list of possible destinations based on the location inputs of the user.`;
      
      console.log('Constructed Prompt:', prompt);

      async function fetchWithRetry(prompt, retries = 3, delay = 2000) {
      for (let attempt = 1; attempt <= retries; attempt++) {
        try {
          const response = await fetch('https://api.openai.com/v1/chat/completions', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': 'your api'  // Replace with your actual API key
            },
            body: JSON.stringify({
              model: 'gpt-4o-mini',
              messages: [{ role: 'user', content: prompt }],
              max_tokens: 150
            })
          });

          if (response.status === 429) { // Too many requests
            if (attempt < retries) {
              console.warn(`Rate limit hit. Retrying in ${delay}ms...`);
              await new Promise(res => setTimeout(res, delay));  // Wait before retry
              delay *= 2;  // Exponential increase in delay
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
      document.getElementById('output').innerText = result || 'No response from API';
    } catch (error) {
      document.getElementById('output').innerText = 'An error occurred. Please try again later.';
    }
    });

  </script>

