<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{ asset('admin/assets/img/find_user.png')}}" class="user-image img-responsive" />
            </li>


            <li>
                <a class="{{ Request::is('admin/dashboard*') ? 'active-menu' : '' }}"
                    href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>


            {{---------------------------------- Add Product Menu -------------------------------------------}}
            <li class="{{ Request::is('admin/menu*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/menu*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-bars fa-3x"></i> Menu <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/menu*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('menu.create') ? 'active-menu' : '' }}"
                            href="{{ route('menu.create') }}">Add New Menu</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('menu.index') ? 'active-menu' : '' }}"
                            href="{{ route('menu.index') }}">All Menu</a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Page -------------------------------------------}}
            <li class="{{ Request::is('admin/page*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/page*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-newspaper-o fa-3x"></i> Page <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/page*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('page.create') ? 'active-menu' : '' }}"
                            href="{{ route('page.create') }}">Add New Page</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('page.index') ? 'active-menu' : '' }}"
                            href="{{ route('page.index') }}">All Page</a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Slider -------------------------------------------}}
            <li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/slider*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-desktop fa-3x"></i> Slider <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/slider*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('slider.create') ? 'active-menu' : '' }}"
                            href="{{ route('slider.create') }}">Add New Slider</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('slider.index') ? 'active-menu' : '' }}"
                            href="{{ route('slider.index') }}">All Slider</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add About -------------------------------------------}}
            <li
                class="{{ Request::is('admin/objects*') || Request::is('admin/corevalue*') || Request::is('admin/milestone*') || Request::is('admin/others*') ? 'active' : '' }}">

                <a class="{{ Request::is('admin/objects*') || Request::is('admin/corevalue*') || Request::is('admin/milestone*') || Request::is('admin/others*') ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-desktop fa-3x"></i> About <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ Request::is('admin/objects*') || Request::is('admin/corevalue*') || Request::is('admin/milestone*') || Request::is('admin/others*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('admin/objects/2*') ? 'active-menu' : '' }}"
                            href="{{ url('admin/objects/2/edit') }}">About Us</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/objects/6*') ? 'active-menu' : '' }}"
                            href="{{ url('admin/objects/6/edit') }}">Mission Vision</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('corevalue.*') ? 'active-menu' : '' }}"
                            href="{{ route('corevalue.index') }}">Core Values</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('milestone.*') ? 'active-menu' : '' }}"
                            href="{{ route('milestone.index') }}">Milestones</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/others/2*') ? 'active-menu' : '' }}"
                            href="{{ url('admin/others/2/edit') }}">Contact</a>
                    </li>
                </ul>
            </li>


            {{---------------------------------- Add Leadership -------------------------------------------}}
            <li class="{{ Request::is('admin/leadership*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/leadership*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-trophy fa-3x"></i> Leadership <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/leadership*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('admin.leadership.create') ? 'active-menu' : '' }}"
                            href="{{ route('admin.leadership.create') }}">Add New Member</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('admin.leadership.index') ? 'active-menu' : '' }}"
                            href="{{ route('admin.leadership.index') }}">All Leadership</a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li class="{{ Request::is('admin/managing-director*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/managing-director*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-user fa-3x"></i> Managing Director <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/managing-director*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('admin.managing_director.index') ? 'active-menu' : '' }}"
                            href="{{ route('admin.managing_director.index') }}">All Managing Directors</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Corporate Ecosystem -------------------------------------------}}
            <li class="{{ Request::is('admin/corporate-ecosystem*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/corporate-ecosystem*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-sitemap fa-3x"></i> Corporate Ecosystem <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/corporate-ecosystem*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('admin.corporate-ecosystem.index') ? 'active-menu' : '' }}"
                            href="{{ route('admin.corporate-ecosystem.index') }}">All Ecosystems</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Corporate Ecosystem -------------------------------------------}}
            <li class="{{ Request::is('admin/client-testimonial*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/client-testimonial*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-comments fa-3x"></i> Client Testimonials <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/client-testimonial*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('admin.client-testimonial.create') ? 'active-menu' : '' }}"
                            href="{{ route('admin.client-testimonial.create') }}">Add New Testimonial</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('admin.client-testimonial.index') ? 'active-menu' : '' }}"
                            href="{{ route('admin.client-testimonial.index') }}">All Testimonials</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Software & Tools -------------------------------------------}}
            <li
                class="{{ Request::is('admin/software*') || Request::is('admin/software-support-settings*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/software*') || Request::is('admin/software-support-settings*') ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-laptop fa-3x"></i> Software & Tools <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ Request::is('admin/software*') || Request::is('admin/software-support-settings*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('admin.software.create') ? 'active-menu' : '' }}"
                            href="{{ route('admin.software.create') }}">Add New Software</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('admin.software.index') ? 'active-menu' : '' }}"
                            href="{{ route('admin.software.index') }}">All Software</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('admin.software-support-settings.edit') ? 'active-menu' : '' }}"
                            href="{{ route('admin.software-support-settings.edit') }}">Support & Installation
                            Settings</a>
                    </li>
                </ul>
            </li>

            {{---------------------------- Add Technical Support Services --------------------------------}}
            <li
                class="{{ Request::is('admin/technicalsupportservice*') || Request::is('admin/technicalsupport*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/technicalsupportservice*') || Request::is('admin/technicalsupport*') ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-life-ring fa-3x"></i> Technical Support Services <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ Request::is('admin/technicalsupportservice*') || Request::is('admin/technicalsupport*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('technicalsupportservice.create') ? 'active-menu' : '' }}"
                            href="{{ route('technicalsupportservice.create') }}">Add New Service</a>
                    </li>

                    <li>
                        <a class="{{ Request::routeIs('technicalsupportservice.index') ? 'active-menu' : '' }}"
                            href="{{ route('technicalsupportservice.index') }}">All Services</a>
                    </li>

                    <li>
                        <a class="{{ Request::routeIs('technicalsupport.index') ? 'active-menu' : '' }}"
                            href="{{ route('technicalsupport.index') }}">
                            <i class="fa fa-wrench"></i> Technical Support Request Form
                        </a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Gallery -------------------------------------------}}
            <li
                class="{{ Request::is('admin/category*') || Request::is('admin/video*') || Request::is('admin/photo*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/category*') || Request::is('admin/video*') || Request::is('admin/photo*') ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-video-camera fa-3x"></i> Gallery <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ Request::is('admin/category*') || Request::is('admin/video*') || Request::is('admin/photo*') ? 'in' : '' }}">

                    <li class="{{ Request::is('admin/category*') || Request::is('admin/photo*') ? 'active' : '' }}">
                        <a href="#">Photo Gallery <span class="fa arrow"></span></a>
                        <ul
                            class="nav nav-third-level collapse {{ Request::is('admin/category*') || Request::is('admin/photo*') ? 'in' : '' }}">
                            <li>
                                <a class="{{ Request::routeIs('category.index') ? 'active-menu' : '' }}"
                                    href="{{ route('category.index') }}">All Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('admin/video*') ? 'active' : '' }}">
                        <a href="#">Video <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse {{ Request::is('admin/video*') ? 'in' : '' }}">
                            <li>
                                <a class="{{ Request::routeIs('video.index') ? 'active-menu' : '' }}"
                                    href="{{ route('video.index') }}">Video</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>

            {{------------------------------- Add Product category/sub-category -----------------------------------}}
            <li
                class="{{ Request::is('admin/item*') || Request::is('admin/subcategory*') || Request::is('admin/pcategory*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/item*') || Request::is('admin/subcategory*') || Request::is('admin/pcategory*') ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-qrcode fa-3x"></i> Product <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ Request::is('admin/item*') || Request::is('admin/subcategory*') || Request::is('admin/pcategory*') ? 'in' : '' }}">

                    <li
                        class="{{ Request::is('admin/item*') || Request::is('admin/subcategory*') || Request::is('admin/pcategory*') ? 'active' : '' }}">
                        <a href="#">Product Gallery <span class="fa arrow"></span></a>

                        <ul
                            class="nav nav-third-level collapse {{ Request::is('admin/item*') || Request::is('admin/subcategory*') || Request::is('admin/pcategory*') ? 'in' : '' }}">
                            <li>
                                <a class="{{ Request::routeIs('item.index') ? 'active-menu' : '' }}"
                                    href="{{ route('item.index') }}">All Product</a>
                            </li>
                            <li>
                                <a class="{{ Request::routeIs('subcategory.index') ? 'active-menu' : '' }}"
                                    href="{{ route('subcategory.index') }}">Sub Category</a>
                            </li>
                            <li>
                                <a class="{{ Request::routeIs('pcategory.index') ? 'active-menu' : '' }}"
                                    href="{{ route('pcategory.index') }}">Product Category</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add News -------------------------------------------}}
            <li class="{{ (Request::is('admin/news*') && !Request::is('admin/newsletter*')) ? 'active' : '' }}">
                <a class="{{ (Request::is('admin/news*') && !Request::is('admin/newsletter*')) ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-newspaper-o fa-3x"></i> News <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ (Request::is('admin/news*') && !Request::is('admin/newsletter*')) ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('news.create') ? 'active-menu' : '' }}"
                            href="{{ route('news.create') }}">Add News</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('news.index') ? 'active-menu' : '' }}"
                            href="{{ route('news.index') }}">All News</a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Experts -------------------------------------------}}

            <li
                class="{{ Request::is('admin/askexpert*') || Request::is('admin/askexpertpage*') || Request::is('admin/askexperttopic*') || Request::is('admin/askexpertexpert*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/askexpert*') || Request::is('admin/askexpertpage*') || Request::is('admin/askexperttopic*') || Request::is('admin/askexpertexpert*') ? 'active-menu' : '' }}"
                    href="#">
                    <i class="fa fa-user-md fa-3x"></i> Experts <span class="fa arrow"></span>
                </a>

                <ul
                    class="nav nav-second-level collapse {{ Request::is('admin/askexpert*') || Request::is('admin/askexpertpage*') || Request::is('admin/askexperttopic*') || Request::is('admin/askexpertexpert*') ? 'in' : '' }}">

                    <li>
                        <a class="{{ Request::routeIs('askexpertpage.index') ? 'active-menu' : '' }}"
                            href="{{ route('askexpertpage.index') }}">
                            <i class="fa fa-file-text"></i> Ask Expert Page Title
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('askexperttopic.index') ? 'active-menu' : '' }}"
                            href="{{ route('askexperttopic.index') }}">
                            <i class="fa fa-list"></i> Consultation Topics
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('askexpertexpert.index') ? 'active-menu' : '' }}"
                            href="{{ route('askexpertexpert.index') }}">
                            Meet Our Experts
                        </a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Work With Us -------------------------------------------}}
            <li class="{{ Request::is('admin/feature*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/feature*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-star fa-3x"></i> Work With Us <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/feature*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('feature.index') ? 'active-menu' : '' }}"
                            href="{{ route('feature.index') }}">Why Work With Us</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Our Client Say -------------------------------------------}}
            <li class="{{ Request::is('admin/photo*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/photo*') ? 'active-menu' : '' }}" href="#">
                    <i class="fa fa-sitemap fa-3x"></i> Our Client Say <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level collapse {{ Request::is('admin/photo*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::routeIs('photo.create') ? 'active-menu' : '' }}"
                            href="{{ route('photo.create') }}">Add Our Client Say</a>
                    </li>
                    <li>
                        <a class="{{ Request::routeIs('photo.index') ? 'active-menu' : '' }}"
                            href="{{ route('photo.index') }}">All Our Client Say</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/client*') || Request::is('admin/clientcategory*') ? 'active-menu' : '' }}"
                    href="#"><i class="fa fa-users fa-3x"></i> Our Clients <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('clientcategory.index') }}">Client Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('client.index') }}">All Clients</a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/partner*') ? 'active-menu' : '' }}" href="#"><i
                        class="fa fa-group fa-3x"></i> Our Partners<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('partner.create') }}">Add Partner</a>
                    </li>
                    <li>
                        <a href="{{ route('partner.index') }}">All Partners</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/statistics*') ? 'active-menu' : '' }}" href="#"><i
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


            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/post*') || Request::is('admin/careerbenefit*') || Request::is('admin/department*') ? 'active-menu' : '' }}"
                    href="#"><i class="fa fa-newspaper-o fa-3x"></i> Career <span class="fa arrow"></span></a>
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

            {{---------------------------------- Add Managing Director -------------------------------------------}}

            <li>
                <a class="{{ Request::is('admin/regionaloffice*') ? 'active-menu' : '' }}" href="#"><i
                        class="fa fa-building fa-3x"></i> Regional Offices <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('regionaloffice.create') }}">Add Regional Office</a>
                    </li>
                    <li>
                        <a href="{{ route('regionaloffice.index') }}">All Regional Offices</a>
                    </li>
                </ul>
            </li>


            {{---------------------------------- Add Managing Director -------------------------------------------}}

            <li>
                <a class="{{ Request::is('admin/dealership-setting*') || Request::is('admin/why-partner*') || Request::is('admin/dealership-category*') || Request::is('admin/eligibility-requirement*') || Request::is('admin/application-process*') || Request::is('admin/partner-support-benefit*') || Request::is('admin/dealership-contact*') || Request::is('admin/dealership*') ? 'active-menu' : '' }}"
                    href="#"><i class="fa fa-briefcase fa-3x"></i> Dealership Page<span class="fa arrow"></span></a>
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
                        <a href="{{ route('dealership.index') }}"><i class="fa fa-store"></i>Dealership Submission
                            Form</a>
                    </li>
                </ul>
            </li>

            {{---------------------------------- Add Managing Director -------------------------------------------}}

            <li>
                <a class="{{ Request::is('admin/newsletter*') || Request::is('admin/complain*') || Request::is('admin/askexpert*') || Request::is('admin/askexpertpage*') || Request::is('admin/askexperttopic*') || Request::is('admin/consultation-request*') || (Request::is('admin/registration*') && !Request::is('admin/registration-benefit*')) ? 'active-menu' : '' }}"
                    href="#"><i class="fa fa-inbox fa-3x"></i> Form Submissions<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('newsletter.index') }}"><i class="fa fa-envelope"></i> Newsletter
                            Subscribers</a>
                    </li>



                    <li>
                        <a href="{{ route('complain.index') }}"><i class="fa fa-exclamation-triangle"></i>
                            Complaints</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('softwarerequest.index') }}"><i class="fa fa-laptop"></i> Software
                            Requests</a>
                    </li> --}}


                    <li>
                        <a href="{{ route('consultation-request.index') }}"><i class="fa fa-comments"></i> Consultation
                            Requests</a>
                    </li>
                    <li>
                        <a href="{{ route('registration.index') }}"><i class="fa fa-registered"></i> Registrations</a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('applicant.index') }}"><i class="fa fa-briefcase"></i> Job Applications</a>
                    </li> --}}

                </ul>
            </li>
            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/registration-benefit*') ? 'active-menu' : '' }}" href="#"><i
                        class="fa fa-gift fa-3x"></i> Registration Benefits <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('registration-benefit.create') }}">Add Registration Benefit</a>
                    </li>
                    <li>
                        <a href="{{ route('registration-benefit.index') }}">All Registration Benefits</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/setting*') ? 'active-menu' : '' }}" href="#"><i
                        class="fa fa-cog fa-3x"></i> Settings <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('setting.create') }}">Add Setting</a>
                    </li>
                    <li>
                        <a href="{{ route('setting.index') }}">All Settings</a>
                    </li>
                </ul>
            </li>
            {{---------------------------------- Add Managing Director -------------------------------------------}}
            <li>
                <a class="{{ Request::is('admin/footer-contact*') || Request::is('admin/footer-address*') || Request::is('admin/contact-sidebar*') || Request::is('admin/others/7*') ? 'active-menu' : '' }}"
                    href="#"><i class="fa fa-building fa-3x"></i> Footer Management <span class="fa arrow"></span></a>
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
                    <li>
                        <a href="{{ route('contact-sidebar.edit') }}">Contact Sidebar</a>
                    </li>

                </ul>
            </li>
            {{---------------------------------- Add Managing Director -------------------------------------------}}

            <li>
                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    href="{{ route('logout') }}"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
            </li>


        </ul>

    </div>

</nav>