<div class="banner">
    <h1>Recent Transaction</h1>
    <div class="search-container">
        <form action="<?= $URL->getAjax("fetchTransac", "dashboard") ?>" method="post">
            <div class="multi-row">
                <div class="set">
                    <label for="Search">Search</label>
                    <input type="search" name="search" id="search" class="form-input" placeholder="Search">
                </div>
                <div class="set">
                    <div class="form-text">
                        *You can Search By Receipt Number.
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="transaction-grid">

</div>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var val = $(this).val();
            if (val.trim() != "") {
                $.ajax({
                    url: '<?= $URL->getAjax('fetchTransac', 'dashboard') ?>',
                    method: 'POST',
                    data: {
                        search: val
                    },
                    success: function(data) {
                        $('.transaction-grid').html(data);
                    }
                });
            } else {
                $.ajax({
                    url: '<?= $URL->getAjax('fetchTransac', 'dashboard') ?>',
                    method: 'POST',
                    success: function(data) {
                        $('.transaction-grid').html(data);
                    }
                });
            }
        });
        $.ajax({
            url: '<?= $URL->getAjax('fetchTransac', 'dashboard') ?>',
            method: 'POST',
            success: function(data) {
                $('.transaction-grid').html(data);
            }
        });
    });
</script>