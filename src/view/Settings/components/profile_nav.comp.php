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
        <a href="<?= $URL->getView("Dashboard", "Dashboard") ?>" class="side-link">Dashboard</a>
        <a href="<?= $URL->getView("Transfer", "Transfer") ?>" class="side-link">Transfer</a>
        <a href="<?= $URL->getView("Loan", "Loan") ?>" class="side-link">Loan</a>
        <a href="<?= $URL->getView("Balance", "Balance") ?>" class="side-link">Balance</a>
    </div>
</aside>
<button class="toggleNav" id="toggleLink"> <b>+</b></button>
<script src="<?= $URL->getJs("SideNav") ?>"></script>
