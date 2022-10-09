<!-- Start section-form -->
<section class="section-form">
    <div class="container">
        <form  method="post" class="js-validation">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-9 col-sm-8">
                        <input name="long_url" type="text" class="form-control js-longLink" placeholder="http://example.com/">
                    </div>
                    <div class="col-lg-3 col-sm-4">
                        <button type="submit" class="btn btn-primary shortener shorten-button">Shorten</button>
                    </div>
                </div>
        </form>
    </div>

    <div class="alert alert-warning alertErrorLink" role="alert">
        Unable to shorten that link. It is not a valid url.
    </div>

    <!-- Start section short link -->
    <?php
        if(isset($shortLink) && !empty($shortLink)) {
            echo '<div class="row link ">
        <div class="col-12">
            <div class="card ">
                <div class="card-body">
                    <div class="row row-cols-sm-1 align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <span class="link"> '. $longLink . '</span>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <span id="short-link" class="link">'.$shortLink .'</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <button class="btn btn-outline-success button-copy" type="button" id="button-copy">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
        }
    ?>

    <!-- End section short link -->


</section>
<!-- End section-form -->
