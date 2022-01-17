<?php
include('inc/top.php');
include('inc/header.php');
?>
<section class="page-info new-block">
    <div class="fixed-bg" style="background: url('media/images/page-info-bg.jpg');"></div>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-wrapper">
                    <h2 class="clr1">Search Girls For Dating</h2>
                    <div class="clearfix"></div>
                    <ul class="list-unstyled">
                        <li><a href="#">Go back to all blogs</a></li>

                    </ul>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search by Name">
                    <a href="#" class="sarch-member-btn"><i class="flaticon-search"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="single-blog new-block">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-blog-wrapper new-block">
                    <div class="img-holder">
                        <img src="media/images/img94.jpg" alt="" class="img-responsive">
                    </div>

                    <div class="tags-block new-block">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="flaticon-shopping"></i></a></li>
                            <li><a href="#">Social Tools</a></li>
                            <li><a href="#">Upgrades</a></li>
                            <li><a href="#">Site Tutorials</a></li>
                            <li><a href="#">Embedding content</a></li>
                            <li><a href="#">Configuration</a></li>
                            <li><a href="#">Appearance</a></li>
                        </ul>
                    </div>
 
                    

                </div><!-- single-blog-wrapper -->


                <div class="blog-slider">
                
                        <div class="b_slider owl-carousel owl-theme" style="margin: 10px 10px; position: fixed; z-index: 300; width: 100px; height: 300px;">
                            <div class="item">
                                <div class="block-stl8">
                                    <div class="img-holder">
                                        <img src="media/images/img95.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="txt-block">
                                        <h4><a href="#">Nulla facilisis nisl vitvolutpat placerat. Pellent habitant
                                                morbi tristique .</a></h4>
                                        <p>1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <div class="comments-block">

                    <!--
                   

                    <div class="comment-box new-block">
                        <div class="img-block">
                            <div class="img-holder">
                                <img src="media/images/img98.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                        <div class="comment">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor aliquam nulla, eu
                                tempor felis elementum eget. In dapibus pharetra dignissim. Nam mattis odio nisl, eget
                                imperdiet leo fringilla eu. </p>
                            <div class="about-commenter">
                                <p><span>Jacob Shah</span> - 2 Day Ago <a href="#" class="replay-btn"><i
                                            class="fa fa-share"></i> replay</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="replied new-block">
                        <div class="comment-box new-block">
                            <div class="img-block">
                                <div class="img-holder">
                                    <img src="media/images/img99.jpg" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="comment">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor aliquam nulla,
                                    eu tempor felis elementum eget. In dapibus pharetra dignissim. Nam mattis odio nisl,
                                    eget imperdiet.</p>
                                <div class="about-commenter">
                                    <p><span>John Deo</span> - 2 Day Ago <a href="#" class="replay-btn"><i
                                                class="fa fa-share"></i> replay</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr new-block">
                    <div class="comment-box new-block">
                        <div class="img-block">
                            <div class="img-holder">
                                <img src="media/images/img99.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                        <div class="comment">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor aliquam nulla, eu
                                tempor felis elementum eget. In dapibus pharetra dignissim. Nam mattis odio nisl, eget
                                imperdiet leo fringilla eu. </p>
                            <div class="about-commenter">
                                <p><span>Jacob Shah</span> - 2 Day Ago <a href="#" class="replay-btn"><i
                                            class="fa fa-share"></i> replay</a></p>
                            </div>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
</section>
<section class="leave-replay new-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title2">
                    <h2 class="fz35">Leave & Reply</h2>
                    <div class="clearfix"></div>
                    <p class="fz20">Aliquam a neque tortor. Donec iaculis auctor turpis. Eporttitor<br> mattis
                        ullamcorper urna. Cras quis elementum</p>
                </div>
            </div>
            <div class="col-lg-12">
                <form>
                    <div class="row">
                        <span id="errormsg"></span>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="from-group">
                                <input type="text" class="form-control" id="email" placeholder="Email id">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="from-group">
                                <input type="text" class="form-control" id="number" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="from-group">
                                <textarea class="form-control" id="comment"
                                    placeholder="Type your comment.."></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="from-group">
                                <button id="submitComment" class="c-btn btn1">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- leave-replay -->



<span id="go_to_top" class="go-to-top">Back</span>
<div class="online-side-nav">
    <span class="nav-btn">
        <a href="blog.php"><i class="flaticon-left-arrow"></i>Tilbage</a>
    </span>
    <div id="chat-sidebar">

        <div class="sidebar-user-box" id="100">
            <img src="media/images/ou1.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Sumit Kumar Pradhan </span>
        </div>

        <div class="sidebar-user-box" id="101">
            <img src="media/images/ou2.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Skptricks </span>
        </div>

        <div class="sidebar-user-box" id="102">
            <img src="media/images/ou3.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Amit Singh </span>
        </div>

        <div class="sidebar-user-box" id="103">
            <img src="media/images/ou4.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Neeraj Tiwari </span>
        </div>

        <div class="sidebar-user-box" id="104">
            <img src="media/images/ou5.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Sorav Singh </span>
        </div>

        <div class="sidebar-user-box" id="105">
            <img src="media/images/ou6.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Lokesh Singh </span>
        </div>

        <div class="sidebar-user-box" id="106">
            <img src="media/images/ou7.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Tony </span>
        </div>

        <div class="sidebar-user-box" id="107">
            <img src="media/images/ou8.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Alex Robby </span>
        </div>

        <div class="sidebar-user-box" id="108">
            <img src="media/images/ou9.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette"></i>
            <span class="slider-username">Pragaya Mishra </span>
        </div>

        <div class="sidebar-user-box" id="109">
            <img src="media/images/ou2.jpg" alt=" " />
            <i class="flaticon-circular-shape-silhouette active"></i>
            <span class="slider-username">Abhishek Mishra </span>
        </div>

    </div>
</div>

</div>

<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit comment</h4>
            </div>
            <div class="modal-body">
                <form id="updateform">
                    <div id="errormsg"></div>
                    <div class="form-group">
                        <label for="editComment">Edit Comment</label>
                        <br>

                        <textarea name="editComment" id="editComment" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-lg" >Edit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg" id="closeButton" name="closeButton"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php include('inc/footer.php')?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Include jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="js/plugins.js"></script>
<!-- Custom -->
<script src="js/custom.js"></script>
<script src="js/singeBlogPage.js" type="module"></script>
<script src="js/comment.js" type="module"></script>
</body>




</html>