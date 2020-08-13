<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cox's Bazar International University</title>

    <link rel="icon" type="image/png" href="../asset/image/cbiu.png" />
    <link rel="stylesheet" href="../asset/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../asset/jquery.fancybox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/utils.css">

    <script type="text/javascript" src="../asset/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="../asset/jquery-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../asset/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../asset/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../asset/title/ticker.css">
    <script src="../asset/title/ticker.js"></script>

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <style>
        button {
            background-color: #441DDF;
            padding: 5px;
            color: #202040;
            border: none;
            border-radius: 3px;
            margin-left: 10px;

        }

        .all-notice,
        .li {
            font-size: 20px;
            text-align: center;
            color: #202040;
            font-weight: bold
        }

        .post-title-mini {
            color: #441DDF;
        }

        .add_notice {
            width: 100%;
        }

        @media only screen and (max-width: 768px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            table,
            tr,
            td {
                display: block;
            }

            button {
                margin-top: 5px;
            }
        }
        .text-center{display: flex; justify-content: center;}
    </style>
</head>

<body>
    <?php include_once("../inc/header.html"); ?>
    <!-- Notice Start -->

    <div class="all-notice">
        <ul>
            <li>Notice Management</li>
        </ul>
    </div>


    <div class="allnotice">
        <div class="row" style="margin-top: 25px">
            <div class="col-3"></div>
            <div class="col-7">
                <div class="text-center">
                    <a href="notice_add.php"> <button class="btn default">Add Notice <img src="../asset/image/add_icon.png"></button></button></a>
                </div>
                <div class="row">
                    <div class="post">
                        <div class="post-scroller-carousel-inner">
                            <table>
                                <div class="space">
                                    <tr>
                                        <div class="post-scroller-carousel-inner">
                                            <div class="post-scroller-item">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <span>Nationwide Essay Competition on Bangabandhu postponed</span>
                                                        <br /><span><i class="fa fa-calendar" aria-hidden="true"></i> 10/03/2020 </span>
                                                    </div>
                                                    <div class="col-5">
                                                        <button class="btn view"><a href="notice_view.php">View</a></button>
                                                        <button class="btn download"> <a href="#" target="_blank">Download</a></button>
                                                        <button class="btn edit"><a href="notice_edit.php">Edit</a></button>
                                                        <button class="btn danger">Delete</button>
                                                    </div>
                                                </div>

                                            </div>
                                    </tr>
                                    
                                </div>
                                <div class="space">
                                    <tr>
                                        <div class="post-scroller-carousel-inner">
                                            <div class="post-scroller-item">
                                                <div class="row">
                                                    <div class="col-7">
                                                       <span> Nationwide Essay Competition on Bangabandhu postponed</span>
                                                        <br /><span><i class="fa fa-calendar" aria-hidden="true"></i> 10/03/2020 </span>
                                                    </div>
                                                    <div class="col-5">
                                                        <button class="btn view"><a href="notice_view.php">View</a></button>
                                                        <button class="btn download"> <a href="#" target="_blank">Download</a></button>
                                                        <button class="btn edit"><a href="notice_edit.php">Edit</a></button>
                                                        <button class="btn danger">Delete</button>
                                                    </div>
                                                </div>

                                            </div>
                                    </tr>
                                    
                                </div>
                            </table>

                            <!==-- Page Pagination===-->

                                <div class="text-center">
                                <a href="#"> <button class="btn paginate">&laquo; Previous</button></a>
                                <a href="#"> <button class="btn paginate">Next &raquo;</button></a>
                                </div>


                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Notice End -->


        <?php include_once("../inc/footer.html"); ?>

</body>

</html>