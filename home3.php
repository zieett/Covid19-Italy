<style>
svg {
    width: 28px;
    position: relative;
    right: 14px;
}


#svgMapPopulation,
#svgMapPopulation>div.svgMap-map-wrapper {
    max-width: 100% !important;
    width: 100%;
}

@media (min-width: 550px) {
    #svgMapPopulation {
        height: 61vh;
    }
}

html {
    background-color: black;
}

.word {
    position: absolute;
    color: red;
    font-size: 25px;
    top: 25px;
    font-weight: bold;
    text-shadow: 1px 1px 2px black, 0 0 1em darkred, 0 0 0.2em darkred;
    cursor: default;
}
</style>


<div class="contents">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.6.1/dist/svg-pan-zoom.min.js"></script>
    <link href="question3/svgMap.css" rel="stylesheet" />
    <script src="question3/svgMap.js"></script>
    <?php include("nav-bar3.php");?>
    <div class="rounded shadow-sm" style="padding:0px 100px;position:relative;">
        <div id="svgMapPopulation" style="max-width: 100% !important;width: 100%;"></div>
        <script src="question3/dataCovidMap.js"></script>
        <script>
        async function a() {
            new svgMap({
                targetElementID: "svgMapPopulation",
                data: {
                    data: {
                        confirmed: {
                            name: "confirmed",
                            format: "{0} cases",
                            thousandSeparator: ".",
                            thresholdMax: 10000000,
                            thresholdMin: 5,
                        },
                        deaths: {
                            name: "deaths",
                            format: "{0} cases",
                            thousandSeparator: ".",
                        },
                    },
                    applyData: "confirmed",
                    values: await rend(),
                },
                flagType: "image",
            });
        }
        a();
        </script>
        <div class="word">
            <span>Covid 19 World Map Density</span>
        </div>
    </div>
    <style>
    .page-link {
        border-radius: 50%;
        margin: 0px 5px;
        background-color: #212529;
        border: black;
        color: white;
    }

    .page-item.active .page-link {
        border-radius: 50%;
        margin: 0px 5px;
        background-color: red;
        border: 1px solid red;
    }

    .page-item.disabled .page-link {
        background-color: #212529;
    }

    .page-item:last-child .page-link,
    .page-item:first-child .page-link {
        border-radius: 50% !important;
    }

    .hide {
        display: none;
    }

    .contents {
        background-color: black;
    }

    .search-input {
        background-color: black;
        border-radius: 8px;
        width: 300px;
        border: 1px solid rgba(255, 255, 255, .5);
    }

    .search-btn {
        border: 1px solid rgba(255, 255, 255, .5);
        border-radius: 8px;
        background-color: black;
        color: rgba(255, 255, 255, .5);
    }

    .navbar {
        border-bottom: 3px solid rgba(255, 255, 255, .5) !important;
        margin: 0px 3px !important;
        border-radius: 15px !important;
    }

    .navbar-brand span {
        position: relative;
    }

    .navbar-brand span::before {
        background-color: rgba(255, 255, 255, .5);
        position: absolute;
        content: "";
        color: rgba(255, 255, 255, .5);
        height: 40px;
        width: 1px;
        right: -15px;
        bottom: -4px;
        border-radius: 15px;
    }

    .image {
        width: 600px;
    }

    .menu {
        color: rgba(255, 255, 255, .5);
        border: 1px solid rgba(255, 255, 255, .5);
        border-radius: 25px;
        background-color: #212529;
    }

    .my-border {
        background-color: #212529;
        border: 1px solid rgba(255, 255, 255, .5);
        border-radius: 25px;

    }

    table {
        border-collapse: collapse;
        border-radius: 25px;
        overflow: hidden;
    }

    .form-control:focus {
        color: white;
        outline: 0;
        background-color: black;
        border: 1px solid rgba(255, 255, 255, .5);
        box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
    }

    html,
    body {
        background-color: black;
    }
    </style>
    <div class="mx-5 text-center text-white-50 fw-bold">
        <h2>Information of covid 19 in Italy</h2>
    </div>
    <div class="mx-5 my-3 menu d-flex justify-content-evenly py-1 pt-2">
        <div class="total d-flex flex-column justify-content-center align-items-center">
            <div class="pb-1">Total confirm case</div>
            <h5></h5>
        </div>
        <div class="recovered d-flex flex-column justify-content-center align-items-center">
            <div class="pb-1">Recovered</div>
            <h5></h5>
        </div>
        <div class="deaths d-flex flex-column justify-content-center align-items-center">
            <div class="pb-1">Deaths</div>
            <h5></h5>
        </div>
        <div class="test d-flex flex-column justify-content-center align-items-center">
            <div class="pb-1">Test perform</div>
            <h5></h5>
        </div>
        <div class="update d-flex flex-column justify-content-center align-items-center">
            <div class="pb-1">Latest Update</div>
            <h5></h5>
        </div>
    </div>

    <div class="content mx-5 mb-5 my-border" id="root"></div>
    <div class="text-center my-2 pagination-container">
        <div class="spinner-border" style="width: 15rem; height: 15rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        function fetchData(page) {
            $(".pagination-container").removeClass("hide");
            $.ajax({
                url: "https://abcsadq.de.r.appspot.com/question3/fetchData3.php",
                method: "POST",
                data: {
                    page: page,
                },
                success: function(data) {
                    // data = JSON.parse(data);
                    data = JSON.parse(data);
                    $("#root").html(data[0]);
                    $(".total").find("h5").text(new Intl.NumberFormat().format(data[1][3]));
                    $(".recovered").find("h5").text(new Intl.NumberFormat().format(data[1][1]));
                    $(".deaths").find("h5").text(new Intl.NumberFormat().format(data[1][2]));
                    $(".test").find("h5").text(new Intl.NumberFormat().format(data[1][4]));
                    $(".update").find("h5").text(data[1][0]);
                    $("#root").addClass("w3-animate-top");
                    $(".pagination-container").addClass("hide");
                    $(".pagination").removeClass("hide");
                }
            });
        }
        fetchData(1);
        $(document).on("click", ".pagination li a", function(e) {
            e.preventDefault();
            // $('.filter').html("<option selected>All</option>");
            $(".pagination").addClass("hide");
            $("#root").removeClass("w3-animate-top");
            $(".pagination-container").removeClass("hide");
            $("#root").html("");
            fetchData($(this).text());
        });
        $(document).on("click", ".search-btn", function(e) {
            e.preventDefault();
            // $('.filter').html("<option selected>All</option>");
            $("#root").removeClass("w3-animate-top");
            $(".pagination-container").removeClass("hide");
            $("#root").html("");
            $.ajax({
                url: "https://abcsadq.de.r.appspot.com/question3/searchData3.php",
                method: "POST",
                data: {
                    date: $(".search-input").val(),
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (!data[1]) {
                        $("#root").html(data[0]);
                        $(".pagination").addClass("hide");
                        $(".pagination-container").addClass("hide");
                        $("#root").addClass("w3-animate-top");

                    } else {
                        fetchData(1);
                    }

                }
            });
        });
    });
    </script>
</div>