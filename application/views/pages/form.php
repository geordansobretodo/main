<br><br><br><br><br>
<div class="container">
  <div class="header">
    <div class="title">What's on your mind?</div>
    <div class="button">
      <button class="btn btn-secondary">Back</button>
    </div>
  </div>
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
    <div id="output" style="margin-top: 20px; padding: 30px; background-color: #f0f0f0; border-radius: 5px;"></div>
    <div id="map" style="height: 150px; width: 100%;"></div>
  </div>
</div>