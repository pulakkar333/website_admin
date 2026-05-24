<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{ asset('admin/assets/img/find_user.png')}}" class="user-image img-responsive" />
            </li>
            <li>
                <a class="{{ Request::is('admin/dashboard*') ? 'active-menu': '' }}"
                    href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>


            <li>
                <a class="{{ Request::is('admin/menu*') ? 'active-menu': '' }}" href="#"><i
                        class="fa fa-bars fa-3x"></i> Menu <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('menu.create') }}">Add New Menu</a>
                    </li>
                    <li>
                        <a href="{{ route('menu.index') }}">All Menu</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="{{ Request::is('admin/page*') ? 'active-menu': '' }}" href="#"><i
                        class="fa fa-newspaper-o fa-3x"></i> Page <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('page.create') }}">Add New Page</a>
                    </li>
                    <li>
                        <a href="{{ route('page.index') }}">All Page</a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="{{ Request::is('admin/slider*') ? 'active-menu': '' }}" href="#"><i
                        class="fa fa-desktop fa-3x"></i> Slider <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('slider.create') }}">Add New Slider</a>
                    </li>
                    <li>
                        <a href="{{ route('slider.index') }}">All Slider</a>
                    </li>

                </ul>
            </li>

            {{-- <li>
                <a class="{{ Request::is('admin/service*') ? 'active-menu': '' }}" href="#"><i
                class="fa fa-tasks fa-3x"></i> Solution <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('service.create') }}">Add Solution</a>
                </li>
                <li>
                    <a href="{{ route('service.index') }}">All Solution</a>
                </li>

            </ul>
            </li> --}}

            <li>
                <a class="{{ Request::is('admin/objects*') || Request::is('admin/corevalue*') || Request::is('admin/milestone*') ? 'active-menu': '' }}" href="#"><i
                        class="fa fa-desktop fa-3x"></i> About <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ asset('admin/objects/2/edit') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ asset('admin/objects/6/edit') }}">Mission Vision</a>
                    </li>
                    <li>
                        <a href="{{ route('corevalue.index') }}">Core Values</a>
                    </li>
                    <li>
                        <a href="{{ route('milestone.index') }}">Milestones</a>
                    </li>

                    {{-- <li>
                        <a href="{{ asset('admin/others/6/edit') }}">Footer About Us</a>
            </li>

            <li>
                <a href="{{ asset('admin/others/2/edit') }}">Contact</a>
            </li> --}}


        </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/statistics*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-bar-chart fa-3x"></i> Statistics <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('admin.statistics.create') }}">Add New Statistic</a>
                </li>
                <li>
                    <a href="{{ route('admin.statistics.index') }}">All Statistics</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/leadership*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-trophy fa-3x"></i> Leadership <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('admin.leadership.create') }}">Add New Member</a>
                </li>
                <li>
                    <a href="{{ route('admin.leadership.index') }}">All Leadership</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/managing-director*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-user fa-3x"></i> Managing Director <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

                {{-- <li>
                        <a href="{{ route('admin.managing_director.create') }}">Add New MD</a>
        </li> --}}
        <li>
            <a href="{{ route('admin.managing_director.index') }}">All Managing Directors</a>
        </li>
        </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/corporate-ecosystem*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-sitemap fa-3x"></i> Corporate Ecosystem <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                {{-- <li>
                        <a href="{{ route('admin.corporate-ecosystem.create') }}">Add New Ecosystem</a>
        </li> --}}
        <li>
            <a href="{{ route('admin.corporate-ecosystem.index') }}">All Ecosystems</a>
        </li>
        </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/client-testimonial*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-comments fa-3x"></i> Client Testimonials <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('admin.client-testimonial.create') }}">Add New Testimonial</a>
                </li>
                <li>
                    <a href="{{ route('admin.client-testimonial.index') }}">All Testimonials</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/software*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-laptop fa-3x"></i> Software & Tools <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('admin.software.create') }}">Add New Software</a>
                </li>
                <li>
                    <a href="{{ route('admin.software.index') }}">All Software</a>
                </li>
                <li>
                    <a href="{{ route('admin.software-support-settings.edit') }}">Support & Installation Settings</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/technicalsupportservice*') || Request::is('admin/technicalsupport*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-life-ring fa-3x"></i> Technical Support Services <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('technicalsupportservice.create') }}">Add New Service</a>
                </li>

                <li>
                    <!-- <a href="{{ route('technicalsupportservice.index') }}">All Services</a> -->
                </li>

                <li>
                    <a href="{{ route('technicalsupport.index') }}"><i class="fa fa-wrench"></i> Technical Support Request Form</a>
                </li>
            </ul>
        </li>

        {{--<li>--}}
        {{--<a href="#"><i class="fa fa-sitemap fa-3x"></i> Photo<span class="fa arrow"></span></a>--}}
        {{--<ul class="nav nav-second-level">--}}
        {{--<li>--}}
        {{--<a href="{{ route('photo.create') }}">Add Photo</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="{{ route('photo.index') }}">All Photo</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}

        {{--<li>--}}
        {{--<a href="{{ route('admin.report') }}"><i class="fa fa-file fa-3x"></i> Report</a>--}}
        {{--</li>--}}

        <li>
            <a href="{{ route('publication.index') }}"><i class="fa fa-video-camera fa-3x"></i>All Media</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-video-camera fa-3x"></i> Gallery<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">


                <li>
                    <a href="#">Photo Gallery<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">

                        {{--<li>--}}
                        {{--<a href="{{ route('item.create') }}">Add New Photo</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ route('item.index') }}">All Photo</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{ route('category.index') }}">All Category</a>
                        </li>
                    </ul>

                </li>

                <li>
                    <a href="#">Video <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        {{--<li>--}}
                        {{--<a href="{{ route('video.create') }}">Add Video</a>--}}
                        {{--</li>--}}
                        {{-- <li>--}}
                        {{-- <a href="{{ route('item.create') }}">Add Product</a>--}}
                        {{-- </li>--}}
                        {{-- <li>--}}
                        {{-- <a href="{{ route('item.index') }}">All Product</a>--}}
                        {{-- </li>--}}
                        <li>
                            <a href="{{ route('video.index') }}">Video</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-qrcode fa-3x"></i> Product<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">Product Gallery<span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="{{ route('item.index') }}">All Product</a>
                        </li>
                        <li>
                            <a href="{{ route('subcategory.index') }}">Sub Category</a>
                        </li>
                        <li>
                            <a href="{{ route('pcategory.index') }}">Parent Category</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ (Request::is('admin/news*') && !Request::is('admin/newsletter*')) ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-newspaper-o fa-3x"></i> News <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('news.create') }}">Add News</a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}">All News</a>
                </li>
            </ul>
        </li>



        <li>
            <a class="{{ Request::is('admin/askexpert*') || Request::is('admin/askexpertpage*') || Request::is('admin/askexperttopic*') || Request::is('admin/askexpertexpert*') ? 'active-menu': '' }}" href="#"><i
                    class="fa fa-user-md fa-3x"></i> Experts <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

                {{-- <li>
                        <a href="{{ route('askexpert.index') }}"><i class="fa fa-question-circle"></i> Ask An Expert</a>
        </li> --}}

        <li>
            <a href="{{ route('askexpertpage.index') }}"><i class="fa fa-file-text"></i> Ask Expert Page Title</a>
        </li>
        <li>
            <a href="{{ route('askexperttopic.index') }}"><i class="fa fa-list"></i> Consultation Topics</a>
        </li>
        <li>
            <a href="{{ route('askexpertexpert.index') }}">Meet Our Experts</a>
        </li>
        </ul>
        </li>


        {{-- <li>
                <a class="{{ Request::is('admin/activity*') ? 'active-menu': '' }}" href="#"><i
            class="fa fa-qrcode fa-3x"></i> Our Projects <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{ route('activity.create') }}">Add Projects</a>
            </li>
            <li>
                <a href="{{ route('activity.index') }}">All Projects</a>
            </li>
        </ul>
        </li> --}}



        <li>
            <a class="{{ Request::is('admin/photo*') ? 'active-menu': '' }}" href="#"><i class="fa fa-sitemap fa-3x"></i> Our Client Say<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('photo.create') }}">Add Our Client Say</a>
                </li>
                <li>
                    <a href="{{ route('photo.index') }}">All Our Client Say</a>
                </li>
            </ul>
        </li>

        {{-- <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Our Clients<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('client.create') }}">Add Our Clients</a>
        </li>
        <li>
            <a href="{{ route('client.index') }}">All Our Clients</a>
        </li>
        </ul>
        </li> --}}

        <!--<li>-->
        <!--    <a class="{{ Request::is('admin/testimonial*') ? 'active-menu': '' }}" href="#"><i class="fa fa-sitemap fa-3x"></i> Testimonial<span class="fa arrow"></span></a>-->
        <!--    <ul class="nav nav-second-level">-->
        <!--        <li>-->
        <!--            <a href="{{ route('testimonial.create') }}">Add Testimonial</a>-->
        <!--        </li>-->
        <!--        <li>-->
        <!--            <a href="{{ route('testimonial.index') }}">All Testimonial</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--</li>-->

        <li>
            <a class="{{ Request::is('admin/post*') ? 'active-menu': '' }}" href="#"><i class="fa fa-newspaper-o fa-3x"></i> Career <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('post.create') }}">Add Post</a>
                </li>
                <li>
                    <a href="{{ route('post.index') }}">All Post</a>
                </li>
                <li>
                    <a href="{{ route('careerbenefit.index') }}">Career Benefits</a>
                </li>
                <li>
                    <a href="{{ route('department.index') }}">Departments</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/partner*') ? 'active-menu': '' }}" href="#"><i class="fa fa-group fa-3x"></i> Partners<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('partner.create') }}">Add Partner</a>
                </li>
                <li>
                    <a href="{{ route('partner.index') }}">All Partners</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/regionaloffice*') ? 'active-menu': '' }}" href="#"><i class="fa fa-building fa-3x"></i> Regional Offices <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('regionaloffice.create') }}">Add Regional Office</a>
                </li>
                <li>
                    <a href="{{ route('regionaloffice.index') }}">All Regional Offices</a>
                </li>
            </ul>
        </li>


        <li>
            <a class="{{ Request::is('admin/feature*') ? 'active-menu': '' }}" href="#"><i class="fa fa-star fa-3x"></i> Company<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('feature.index') }}">Why Work With Us</a>
                </li>

            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/dealership-setting*') || Request::is('admin/why-partner*') || Request::is('admin/dealership-category*') || Request::is('admin/eligibility-requirement*') || Request::is('admin/application-process*') || Request::is('admin/partner-support-benefit*') || Request::is('admin/dealership-contact*') || Request::is('admin/dealership*') ? 'active-menu': '' }}" href="#"><i class="fa fa-briefcase fa-3x"></i> Dealership Page<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('dealership-setting.edit') }}">Page Heading</a>
                </li>
                <li>
                    <a href="{{ route('why-partner.index') }}">Why Partner With Us</a>
                </li>
                <li>
                    <a href="{{ route('dealership-category.index') }}">Dealership Categories</a>
                </li>
                <li>
                    <a href="{{ route('eligibility-requirement.index') }}">Eligibility Requirements</a>
                </li>
                <li>
                    <a href="{{ route('application-process.index') }}">Application Process</a>
                </li>
                <li>
                    <a href="{{ route('partner-support-benefit.index') }}">Partner Support & Benefits</a>
                </li>
                <li>
                    <a href="{{ route('dealership-contact.edit') }}">Contact Information</a>
                </li>
                <li>
                    <a href="{{ route('dealership.index') }}"><i class="fa fa-store"></i>Dealership Contact</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/client*') || Request::is('admin/clientcategory*') ? 'active-menu': '' }}" href="#"><i class="fa fa-users fa-3x"></i> Client Management<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('clientcategory.index') }}">Client Categories</a>
                </li>
                <li>
                    <a href="{{ route('client.index') }}">All Clients</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/newsletter*') || Request::is('admin/complain*') || Request::is('admin/askexpert*') || Request::is('admin/askexpertpage*') || Request::is('admin/askexperttopic*') || Request::is('admin/consultation-request*') || (Request::is('admin/registration*') && !Request::is('admin/registration-benefit*')) ? 'active-menu': '' }}" href="#"><i class="fa fa-inbox fa-3x"></i> Form Submissions<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('newsletter.index') }}"><i class="fa fa-envelope"></i> Newsletter Subscribers</a>
                </li>



                <li>
                    <a href="{{ route('complain.index') }}"><i class="fa fa-exclamation-triangle"></i> Complaints</a>
                </li>
                {{-- <li>
                        <a href="{{ route('softwarerequest.index') }}"><i class="fa fa-laptop"></i> Software Requests</a>
        </li> --}}


        <li>
            <a href="{{ route('consultation-request.index') }}"><i class="fa fa-comments"></i> Consultation Requests</a>
        </li>
        <li>
            <a href="{{ route('registration.index') }}"><i class="fa fa-registered"></i> Registrations</a>
        </li>

        {{-- <li>
                        <a href="{{ route('applicant.index') }}"><i class="fa fa-briefcase"></i> Job Applications</a>
        </li> --}}

        </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/registration-benefit*') ? 'active-menu': '' }}" href="#"><i class="fa fa-gift fa-3x"></i> Registration Benefits <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('registration-benefit.create') }}">Add Registration Benefit</a>
                </li>
                <li>
                    <a href="{{ route('registration-benefit.index') }}">All Registration Benefits</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/setting*') ? 'active-menu': '' }}" href="#"><i class="fa fa-cog fa-3x"></i> Settings <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('setting.create') }}">Add Setting</a>
                </li>
                <li>
                    <a href="{{ route('setting.index') }}">All Settings</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="{{ Request::is('admin/footer-contact*') || Request::is('admin/footer-address*') || Request::is('admin/others/7*') ? 'active-menu': '' }}" href="#"><i class="fa fa-building fa-3x"></i> Footer Management <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('footer-contact.edit') }}">Contact Information</a>
                </li>
                <li>
                    <a href="{{ route('footer-address.create') }}">Add Address</a>
                </li>
                <li>
                    <a href="{{ route('footer-address.index') }}">All Addresses</a>
                </li>
                <li>
                    <a href="{{ route('others.edit', 7) }}">Social Link</a>
                </li>
            </ul>
        </li>


        <li>
            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                href="{{ route('logout') }}"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
        </li>


        </ul>

    </div>

</nav>