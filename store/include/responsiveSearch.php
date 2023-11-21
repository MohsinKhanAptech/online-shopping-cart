<!-- Responsive-Search -->
<div class="responsive-search-wrapper">
    <button type="button" class="button ion ion-md-close" id="responsive-search-close-button"></button>
    <div class="responsive-search-container">
        <div class="container" style="position: relative ;top: -10vh;">
            <p>Start typing and press Enter to search</p>
            <form class="responsive-search-form" action="shop.php" method="get">
                <label class="sr-only" for="search-text">Search</label>
                <input onkeyup="showResult(this.value,document.getElementById('resCat').value);" name="search" id="search-text" type="text" class="responsive-search-field" placeholder="Search" maxlength="100">
                <input type="hidden" id="resCat" name="category" value="0">
                <i class="fas fa-search"></i>
                <div id="responsiveSearch"></div>
            </form>
        </div>
    </div>
</div>
<!-- Responsive-Search /- -->