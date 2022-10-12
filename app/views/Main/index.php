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
<script>
    let form = document.querySelector('.js-validation');
    let inputLink = document.querySelector('.js-longLink');

    form.onsubmit = function () {

        const isValidUrl = urlString=> {
            let urlPattern = new RegExp('^(https?:\\/\\/)'+ // validate protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string
                '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator
            return !!urlPattern.test(urlString);
        }

        console.log(inputLink.value);
        if (!isValidUrl(inputLink.value)) {
            console.log('work');
            let alertLinkError = document.querySelector('.alertErrorLink');
            alertLinkError.classList.add('showErrorLink');

            setTimeout(function(){
                alertLinkError.classList.remove('showErrorLink');
            }, 3000)

            return false;
        }

    }
</script>
