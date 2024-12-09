<br><br><br><br><br>
<div class="container">
  <div class="header">
    <div class="title">What's on your mind?</div>
    <div class="button">
      <a href="<?= base_url('Home') ?>"><button class="btn btn-secondary">Back</button></a>
    </div>
  </div>
  <div class="content">
    <form id="preferenceForm">
      <div class="user-details">
        <div class="input-box mb-3">
          <span class="details">Province</span>
          <select id="province" name="province" class="form-select" required>
            <option value="" selected disabled>Select Province</option>
            <?php foreach ($province as $prov) { ?>
              <option value="<?= htmlspecialchars($prov['value']) ?>"><?= htmlspecialchars($prov['value']) ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="input-box">
          <span class="details">Country</span>
          <input type="text" id="country" placeholder="Enter country" value="Philippines" disabled required>
        </div>
        <div class="input-box mb-3">
          <select id="currentLoc" name="currentLoc" class="form-select" hidden>
            <option id="nearbyOption" value="near me" selected>Nearby</option>
            <?php foreach ($province as $prov) { ?>
              <option value="<?= htmlspecialchars($prov['value']) ?>"><?= htmlspecialchars($prov['value']) ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="input-box mb-3">
          <select id="filters" name="filters" class="form-select">
          <option value="" selected disabled>Filter</option>
          <option value="Halal">Halal</option>
          <?php foreach ($province as $prov) { ?>
              <option value="<?= htmlspecialchars($prov['value']) ?>"><?= htmlspecialchars($prov['value']) ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="place-details">
      <div class="input-box mb-3">
          <span class="details">Place</span>
          <select id="place" name="place" class="form-select" required>
            <option value="" selected disabled>Select Place</option>
            <?php foreach ($places as $place) { ?>
              <option value="<?= htmlspecialchars($place['value']) ?>"><?= htmlspecialchars($place['value']) ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="input-box">
          <span class="details">Budget</span>
          <input type="text" id="budget" name="budget" placeholder="Enter country" value="Philippines" disabled required>
        </div>
      <div class="button">
        <input type="submit" value="Go">
      </div>
    </form>
    <div class="" id="results"></div>
    <div id="output" style="margin-top: 20px; padding: 30px; background-color: #f0f0f0; border-radius: 5px;"></div>
    <div id="map" style="height: 150px; width: 100%;"></div>
  </div>
</div>