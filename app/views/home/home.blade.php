@extends ('home.layout')

@section ('content')

<style type="text/css">
    .main{
        height: 100%;
        min-height: 450px;
        padding: 50px;
        padding-top: 10%;
        background: #123;
        background: url(http://subtlepatterns.com/patterns/photography.png);
    }
    .temp_active{
        background: #eee;
    }
    .main-search{
        height: 40px;
    }
</style>
<!-- start: Flexslider -->
        <div class="main">
                <div class="from-group col-md-6 col-md-offset-3">
                    <input class="autocomplete form-control main-search">
                </div>

                <label class="col-md-6 col-md-offset-3"> Tip: Start searching by college name</label>
        </div>
        <!-- end: Flexslider -->

<div class="container">
        <hr>

        <div class="jumbotron">
            <h3>
                Infermap is a free comprehensive platform that improves the college selecting process, based on individual resources and requirements. 
                Inspired by a belief that all students deserve access to good guidance, infermap aims to create the interactive tools and media that guide students as they find, afford and enroll in a college that’s a good fit for them.
            </h3>
            <p><a href="{{URL::route('home.about')}}" class="btn btn-primary btn-lg">About Us &raquo;</a></p>
        </div><!--/.jumbotron-->
        <!-- start: Row -->
        <div class="title">
            <h3>Our Products</h3>
        </div>
        <hr>
        <div class="row">

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-check circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>College Search</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                            </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-location-arrow circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Review</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa fa-tablet circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Ask a Question</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
        </div>
        <!-- end: Row -->   

        <div class="row">
            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa  fa-bullseye circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Counselling</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
             <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa   fa-caret-square-o-up circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Preparation meter</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

              <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa   fa-caret-square-o-up circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>My College Plan</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
        </div>

         <div class="row">
            <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa  fa-bullseye circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>My College Plan</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->
             <!-- start: Icon Box Start -->
            <div class="col-sm-6 col-md-4">
                
                <div class="icons-box vertical">
                    
                    <div class="row">
                        
                        <div class="col-xs-4">
                            <i class="fa   fa-caret-square-o-up circle full-color big"></i>
                        </div>

                        <div class="col-xs-8">
                            <h3>Blog</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                        </div>
                        
                    </div>      

                </div>
                
            </div>
            <!-- end: Icon Box-->

        </div>
        <hr>
        
        <!-- start: Row -->
        <div class="row">

            <div class="col-sm-12">
                
                <div class="title"><h3>Related Blogs</h3></div>
                
                <!-- start: Row -->
                <div class="row">
        
                    <div class="col-sm-4">
                        <div class="item-description">
                            <h4><a href="http://www.infermap.com/blog/related-topics/">The Insight Story Of Premier Engineering Institutes Of India : "The" IITs</a></h4>
                            <p>Indian Institutes Of Technology are undoubtedly the most prestigious colleges of engineering in India , giving admissions to the best brains of India . Getting into an IIT for an engineering aspirant is like a roaring milestone ...</p>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="item-description">
                            <h4><a href="http://www.infermap.com/blog/engineering-career/">Engineering as a career</a></h4>
                            <p>The American Engineers' Council for Professional Development has defined "Engineering " as: " The creative application of scientific principles to design or develop structures, machines, apparatus, or manufacturing processes, or works utilizing...</p>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="item-description">
                            <h4><a href="http://www.infermap.com/blog/need-infermap/">Why we need Infermap?</a></h4>
                            <p>Well, looking for the right college can be a menace! With the growing number of students pting for engineering and decreasing no of off shore opportunities students finally end up in a wrong college or with a wrong stream...</p>
                        </div>
                    </div>
                
                
                </div>
                <!-- end: Row -->

            </div>

           

        </div>
        <!-- end: Row -->
        
        <hr>
        
    </div>

<script type="text/javascript">

</script>
@stop
