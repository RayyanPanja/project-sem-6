<aside class="side-nav-bar" open>
    <div class="user-details">
        <div class="side-nav-user-img-holder">
            <img src="<?= $URL->getProfileImage($_SESSION['Img_Path']); ?>" alt="IMG" class="side-nav-pfp-img">
        </div>
        <div class="user-name">
            <h1><?= $_SESSION['Firstname'] ?></h1>
        </div>
    </div>
    <div class="side-nav-link-set">
        <a href="<?= $URL->getHomePage() ?>" class="side-link">Home</a>
        <fieldset class="side-nav-link-set">
            <legend align="center"><h2>Dashbord Links</h2></legend>
            <a href="<?= $URL->getView("Dashboard", "Dashboard") ?>#inventory" class="side-link">Inventory</a>
            <a href="<?= $URL->getView("Dashboard", "Dashboard") ?>#Loan" class=" side-link">Loan Application</a>
            <a href="<?= $URL->getView("Dashboard", "Dashboard") ?>#Review" class=" side-link">Message Status</a>
        </fieldset>
        <a href="<?= $URL->getView("Transfer", "Transfer") ?>" class="side-link">Transfer</a>
        <a href="<?= $URL->getView("Loan", "Loan") ?>" class="side-link">Loan</a>
        <a href="<?= $URL->getView("Balance", "Balance") ?>" class="side-link">Balance</a>
        <a href="<?= $URL->getView("Settings", "Settings") ?>" class="side-link">Settings</a>
    </div>
</aside>
<button class="toggleNav" id="toggleLink"> <b>+</b></button>
<script src="<?= $URL->getJs("SideNav") ?>"></script>

<script>
    const TrackHolder = document.querySelector('#track-holder')
    const TrackSet = document.querySelector('.track-set');
    TrackHolder.addEventListener('mouseover', () => {
        TrackSet.style.display = "block"
    })
    TrackHolder.addEventListener('mouseout', () => {
        TrackSet.style.display = "none"
    })
</script>