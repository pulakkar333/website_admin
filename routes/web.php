<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\DmcDayController;
use App\Http\Controllers\admin\MoneyReceiptController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ActivityController;
use App\Http\Controllers\admin\PublicationController;
use App\Http\Controllers\admin\MedicalFeatureController;
use App\Http\Controllers\admin\MicroFinanceController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ObjectsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\RatingController;
use App\Http\Controllers\frontend\RegistrationController;
use App\Http\Controllers\frontend\AdminController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\MedicalSliderController;
use App\Http\Controllers\admin\MicroSliderController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\LifeMemberController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\PreviousProgramController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ParentCategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\PhotoGalleryController;
use App\Http\Controllers\admin\ClientsController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\CompanyManagementController;
use App\Http\Controllers\admin\LinkController;
use App\Http\Controllers\admin\OthersController;
use App\Http\Controllers\admin\NeedHelpController;
use App\Http\Controllers\admin\MissionController;
use App\Http\Controllers\admin\RatingTypeController;
use App\Http\Controllers\admin\RatingListController;
use App\Http\Controllers\admin\OutlookController;
use App\Http\Controllers\admin\AdminUser;
use App\Http\Controllers\admin\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send-test-email', function () {
    \Mail::raw('Test Gmail SMTP works ✅', function ($m) {
        $m->to('esoftbd2004@gmail.com')->subject('Gmail SMTP Test');
    });
    return 'OK';
});

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/day', [HomeController::class, 'day'])->name('day');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/Life-Member', [HomeController::class, 'lifemember'])->name('life.member');
Route::get('/facilities', [HomeController::class, 'facility'])->name('facility');
Route::get('Ho/Yesg/{slug}', [MoneyReceiptController::class, 'details'])->name('money.details');
Route::get('money/pdf/{slug}', [MoneyReceiptController::class, 'pdf'])->name('money.pdf');
Route::post('dmc/day', [HomeController::class, 'dmcday'])->name('dmc.day');
Route::get('dmc/invoice/{slug}', [HomeController::class, 'invoice'])->name('dmc.invoice');
Route::post('dmc/pay/success', [HomeController::class, 'dmcpay'])->name('dmc.pay.success');
Route::get('dmc/ticket/{slug}', [HomeController::class, 'ticket'])->name('dmc.ticket');
Route::get('dmc/successmessage', [HomeController::class, 'successmessage'])->name('dmc.successmessage');
Route::get('dmc/failed', [HomeController::class, 'failed'])->name('dmc.failed');
Route::post('dmc/fee-shurjopay-submission', [HomeController::class, 'shurjopaysubmission'])->name('dmc.shurjopay.submission');
Route::get('/payment-response', [HomeController::class, 'payment_response'])->name('payment-response');
Route::get('dmc/success/{slug}', [HomeController::class, 'success'])->name('dmc.success');
Route::get('dmc/success/admin/{slug}', [HomeController::class, 'success2'])->name('dmc.success.admin');
Route::get('Non/subscriber-fee-payement-submission/{id}/{subscriptionid}/{name}/{email}/{amount}/{year}/{subscriber_number}/{tx_id}', [SubscriberDashboardController::class, 'nonsubfee_payment_submit'])->name('nonsubfees-payment-submission');
Route::get('news/details/{slug}', [NewsController::class, 'details'])->name('news.details');
Route::get('CommitteeMeetting/details/{slug}', [ActivityController::class, 'details'])->name('com.details');
Route::get('committee/details/{slug}', [HomeController::class, 'committeedetails'])->name('committee.details');
Route::get('publication-details/{slug}', [PublicationController::class, 'details'])->name('publication.details');
Route::get('medical-feature-details/{slug}', [MedicalFeatureController::class, 'details'])->name('medicalfeature.details');
Route::get('micro-finance-details/{slug}', [MicroFinanceController::class, 'details'])->name('microfeature.details');
Route::get('service-details/{slug}', [ServiceController::class, 'details'])->name('service.details');
Route::get('Mission-details/{slug}', [ObjectsController::class, 'details'])->name('object.details');
Route::get('article-research/{slug}', [ServiceController::class, 'details'])->name('article.details.details');
Route::get('news', [HomeController::class, 'all_news'])->name('news.all');
Route::get('events', [HomeController::class, 'all_notice'])->name('notice.all');
Route::get('district-committee', [HomeController::class, 'districtcommittee'])->name('district.committee');
Route::get('Dhaka', [HomeController::class, 'micro'])->name('museum.dhaka');
Route::get('Rangpur', [HomeController::class, 'rangpur'])->name('museum.rangpur');
Route::post('member-search', [HomeController::class, 'reportsearch'])->name('report.search');
Route::get('need-help', [HomeController::class, 'need_help'])->name('need.help');
Route::get('committee-list', [HomeController::class, 'memberlist'])->name('member-list');
Route::get('past-leader', [HomeController::class, 'famous'])->name('past-leader');
Route::get('Member-Details/{slug}', [HomeController::class, 'memberdetails'])->name('member.details');
Route::get('member-form', [HomeController::class, 'memberform'])->name('member.form');
Route::get('Medical-Waste-Management', [HomeController::class, 'medical'])->name('medical.waste.all');
Route::get('Micro-Finance', [HomeController::class, 'micro'])->name('micro.finance.all');
Route::get('team', [HomeController::class, 'team'])->name('team.all');
Route::get('previous-program', [HomeController::class, 'previous'])->name('previous.all');
Route::get('Executive-Committee', [HomeController::class, 'executive'])->name('executive.committee.all');
Route::get('initative', [HomeController::class, 'initative'])->name('pr.news.all');
Route::get('career', [HomeController::class, 'career']);
Route::get('gallery', [HomeController::class, 'category']);
Route::get('video', [HomeController::class, 'video']);
Route::get('contact', [HomeController::class, 'contact']);
Route::post('contactus', [HomeController::class, 'contactmail'])->name('contact.us');
Route::post('helpform', [HomeController::class, 'helpform'])->name('help.form');
Route::post('membership', [HomeController::class, 'memberformstore'])->name('member.submit');
Route::get('product_category', [HomeController::class, 'category']);
Route::get('products_item/{id}', [HomeController::class, 'item']);
Route::get('products_gallery/{id}', [HomeController::class, 'product_item']);
Route::get('products_details/{id}', [HomeController::class, 'products_details']);
Route::get('mission_vission', [HomeController::class, 'mission_vission']);
Route::get('article-research', [HomeController::class, 'all_article'])->name('article.news.all');
Route::get('page/{slug}', [PageController::class, 'details'])->name('page.details');
Route::get('Texpeon/{slug}', [ObjectsController::class, 'details'])->name('about.details');
Route::get('rating-details/{slug}', [RatingController::class, 'details'])->name('rating.details');
Route::get('/search', [HomeController::class, 'search'])->name('company.search');
Route::get('/rating-search', [HomeController::class, 'rating_search'])->name('rating.search');

// Software Download Route (Public)
Route::get('software/download/{id}', [\App\Http\Controllers\admin\SoftwareProductController::class, 'download'])->name('software.download');


// Authentication Routes
Route::get('register', [RegistrationController::class, 'index'])->name('register');
Route::post('register', [RegistrationController::class, 'registration'])->name('register');
Route::get('register/pending', [RegistrationController::class, 'pending'])->name('ragistration.index');

// Admin Routes
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('rating-information', [AdminController::class, 'index']);
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('districtall/{slug}', [ServiceController::class, 'index'])->name('district.all');
    Route::get('adddistrict/{slug}', [ServiceController::class, 'create'])->name('district.add');
    Route::get('service/view/{slug}', [ServiceController::class, 'view'])->name('service.view');
    Route::get('committee/add/{slug}', [PreviousProgramController::class, 'create'])->name('committee.add');
    Route::get('branch/{slug}', [MoneyReceiptController::class, 'alluser'])->name('money.all');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('passwordchange', [ChangePasswordController::class, 'index'])->name('password.change');
    Route::post('passwordchange', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    Route::resource('slider', SliderController::class);
    Route::resource('money_receipt', MoneyReceiptController::class);
    Route::resource('medicalslider', MedicalSliderController::class);
    Route::resource('microslider', MicroSliderController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('contactus', ContactUsController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('page', PageController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('life', LifeMemberController::class);
    Route::resource('news', NewsController::class);
    Route::resource('dmcday', DmcDayController::class);
    Route::resource('medicalfeature', MedicalFeatureController::class);
    Route::resource('microfinancefeature', MicroFinanceController::class);
    Route::resource('team', TeamController::class);

    Route::get('faq/create/{id}', [\App\Http\Controllers\admin\FaqController::class, 'create'])->name('faq.create');
    Route::resource('faq', \App\Http\Controllers\admin\FaqController::class)->except('create');

    Route::get('packagepricing/create/{id}', [\App\Http\Controllers\admin\PackagePriceController::class, 'create'])->name('packagepricing.create');
    Route::resource('packagepricing', \App\Http\Controllers\admin\PackagePriceController::class)->except('create');

    Route::get('technology/create/{id}', [\App\Http\Controllers\admin\TechnologyController::class, 'create'])->name('technology.create');
    Route::resource('technology', \App\Http\Controllers\admin\TechnologyController::class)->except('create');

    Route::get('webprocess/create/{id}', [\App\Http\Controllers\admin\WebProcessController::class, 'create'])->name('webprocess.create');
    Route::resource('webprocess', \App\Http\Controllers\admin\WebProcessController::class)->except('create');

    Route::get('clilentbenifts/create/{id}', [\App\Http\Controllers\admin\ClientBenifitsController::class, 'create'])->name('clilentbenifts.create');
    Route::resource('clilentbenifts', \App\Http\Controllers\admin\ClientBenifitsController::class)->except('create');

    Route::get('featured/create/{id}', [\App\Http\Controllers\admin\FeaturedController::class, 'create'])->name('featured.create');
    Route::resource('featured', \App\Http\Controllers\admin\FeaturedController::class)->except(['create']);

    Route::get('qualityservice/create/{id}', [\App\Http\Controllers\admin\QualityServiceController::class, 'create'])->name('qualityservice.create');
    Route::resource('qualityservice', \App\Http\Controllers\admin\QualityServiceController::class)->except(['create']);




    Route::resource('previous', PreviousProgramController::class);
    Route::resource('publication', PublicationController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('pcategory', ParentCategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::resource('item', ItemController::class);
    Route::get('item/{id}/download-brochure', [ItemController::class, 'downloadBrochure'])->name('item.download.brochure');
    Route::get('item/{id}/toggle-latest', [ItemController::class, 'toggleLatest'])->name('item.toggleLatest');
    Route::resource('photo', PhotoGalleryController::class);
    Route::resource('client', ClientsController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('video', VideoController::class);
    Route::resource('company', CompanyManagementController::class);
    Route::resource('link', LinkController::class);
    Route::resource('others', OthersController::class);
    Route::resource('NeedHelp', NeedHelpController::class);
    Route::resource('mission', MissionController::class);
    Route::resource('objects', ObjectsController::class);
    Route::resource('rating', RatingController::class);
    Route::resource('sector', SectorMyController::class);
    Route::resource('industry', IndustryController::class);
    Route::resource('ratingtype', RatingTypeController::class);
    Route::resource('ratinglist', RatingListController::class);
    Route::resource('outlook', OutlookController::class);
    Route::resource('adminuser', AdminUser::class);
    Route::resource('user', UserController::class);
    Route::resource('post', \App\Http\Controllers\admin\PostController::class);
    Route::resource('applicant', \App\Http\Controllers\admin\ApplicantController::class);
    Route::get('/approve', [AdminUser::class, 'pending'])->name('adminuser.approve');
    Route::get('edituser/{slug}', [AdminUser::class, 'edituser'])->name('adminuser.edituser');

    // New Dynamic Content Management Routes
    Route::resource('partner', \App\Http\Controllers\admin\PartnerController::class);
    Route::resource('feature', \App\Http\Controllers\admin\FeatureController::class);
    Route::resource('corevalue', \App\Http\Controllers\admin\CoreValueController::class);
    Route::resource('milestone', \App\Http\Controllers\admin\MilestoneController::class);
    Route::resource('careerbenefit', \App\Http\Controllers\admin\CareerBenefitController::class);
    Route::resource('regionaloffice', \App\Http\Controllers\admin\RegionalOfficeController::class);

    // Dealership Page Management Routes
    Route::get('dealership-setting/edit', [\App\Http\Controllers\admin\DealershipPageSettingController::class, 'edit'])->name('dealership-setting.edit');
    Route::put('dealership-setting', [\App\Http\Controllers\admin\DealershipPageSettingController::class, 'update'])->name('dealership-setting.update');
    Route::resource('why-partner', \App\Http\Controllers\admin\WhyPartnerWithUsController::class);
    Route::resource('dealership-category', \App\Http\Controllers\admin\DealershipCategoryController::class);
    Route::resource('eligibility-requirement', \App\Http\Controllers\admin\EligibilityRequirementController::class);
    Route::resource('application-process', \App\Http\Controllers\admin\ApplicationProcessController::class);
    Route::resource('partner-support-benefit', \App\Http\Controllers\admin\PartnerSupportBenefitController::class);
    Route::get('dealership-contact/edit', [\App\Http\Controllers\admin\DealershipContactController::class, 'edit'])->name('dealership-contact.edit');
    Route::put('dealership-contact', [\App\Http\Controllers\admin\DealershipContactController::class, 'update'])->name('dealership-contact.update');

    // Footer Management Routes
    Route::get('footer-contact/edit', [\App\Http\Controllers\admin\FooterContactController::class, 'edit'])->name('footer-contact.edit');
    Route::put('footer-contact', [\App\Http\Controllers\admin\FooterContactController::class, 'update'])->name('footer-contact.update');
    Route::resource('footer-address', \App\Http\Controllers\admin\FooterAddressController::class);

    Route::resource('department', \App\Http\Controllers\admin\DepartmentController::class);
    Route::resource('clientcategory', \App\Http\Controllers\admin\ClientCategoryController::class);
    Route::resource('setting', \App\Http\Controllers\admin\SettingController::class);

    // Statistics Management Routes
    Route::get('statistics', [\App\Http\Controllers\admin\StatisticController::class, 'index'])->name('admin.statistics.index');
    Route::get('statistics/create', [\App\Http\Controllers\admin\StatisticController::class, 'create'])->name('admin.statistics.create');
    Route::post('statistics', [\App\Http\Controllers\admin\StatisticController::class, 'store'])->name('admin.statistics.store');
    Route::get('statistics/{id}/edit', [\App\Http\Controllers\admin\StatisticController::class, 'edit'])->name('admin.statistics.edit');
    Route::put('statistics/{id}', [\App\Http\Controllers\admin\StatisticController::class, 'update'])->name('admin.statistics.update');
    Route::delete('statistics/{id}', [\App\Http\Controllers\admin\StatisticController::class, 'destroy'])->name('admin.statistics.destroy');

    // Leadership Management Routes
    Route::get('leadership', [\App\Http\Controllers\admin\LeadershipController::class, 'index'])->name('admin.leadership.index');
    Route::get('leadership/create', [\App\Http\Controllers\admin\LeadershipController::class, 'create'])->name('admin.leadership.create');
    Route::post('leadership', [\App\Http\Controllers\admin\LeadershipController::class, 'store'])->name('admin.leadership.store');
    Route::get('leadership/{id}/edit', [\App\Http\Controllers\admin\LeadershipController::class, 'edit'])->name('admin.leadership.edit');
    Route::put('leadership/{id}', [\App\Http\Controllers\admin\LeadershipController::class, 'update'])->name('admin.leadership.update');
    Route::delete('leadership/{id}', [\App\Http\Controllers\admin\LeadershipController::class, 'destroy'])->name('admin.leadership.destroy');

    // Managing Director Page Routes
    Route::get('managing-director', [\App\Http\Controllers\admin\ManagingDirectorController::class, 'index'])->name('admin.managing_director.index');
    Route::get('managing-director/create', [\App\Http\Controllers\admin\ManagingDirectorController::class, 'create'])->name('admin.managing_director.create');
    Route::post('managing-director', [\App\Http\Controllers\admin\ManagingDirectorController::class, 'store'])->name('admin.managing_director.store');
    Route::get('managing-director/{id}/edit', [\App\Http\Controllers\admin\ManagingDirectorController::class, 'edit'])->name('admin.managing_director.edit');
    Route::put('managing-director/{id}', [\App\Http\Controllers\admin\ManagingDirectorController::class, 'update'])->name('admin.managing_director.update');
    Route::delete('managing-director/{id}', [\App\Http\Controllers\admin\ManagingDirectorController::class, 'destroy'])->name('admin.managing_director.destroy');

    // Corporate Ecosystem Management Routes
    Route::get('corporate-ecosystem', [\App\Http\Controllers\admin\CorporateEcosystemController::class, 'index'])->name('admin.corporate-ecosystem.index');
    Route::get('corporate-ecosystem/create', [\App\Http\Controllers\admin\CorporateEcosystemController::class, 'create'])->name('admin.corporate-ecosystem.create');
    Route::post('corporate-ecosystem', [\App\Http\Controllers\admin\CorporateEcosystemController::class, 'store'])->name('admin.corporate-ecosystem.store');
    Route::get('corporate-ecosystem/{id}/edit', [\App\Http\Controllers\admin\CorporateEcosystemController::class, 'edit'])->name('admin.corporate-ecosystem.edit');
    Route::put('corporate-ecosystem/{id}', [\App\Http\Controllers\admin\CorporateEcosystemController::class, 'update'])->name('admin.corporate-ecosystem.update');
    Route::delete('corporate-ecosystem/{id}', [\App\Http\Controllers\admin\CorporateEcosystemController::class, 'destroy'])->name('admin.corporate-ecosystem.destroy');

    // Client Testimonials Management Routes
    Route::get('client-testimonial', [\App\Http\Controllers\admin\ClientTestimonialController::class, 'index'])->name('admin.client-testimonial.index');
    Route::get('client-testimonial/create', [\App\Http\Controllers\admin\ClientTestimonialController::class, 'create'])->name('admin.client-testimonial.create');
    Route::post('client-testimonial', [\App\Http\Controllers\admin\ClientTestimonialController::class, 'store'])->name('admin.client-testimonial.store');
    Route::get('client-testimonial/{id}/edit', [\App\Http\Controllers\admin\ClientTestimonialController::class, 'edit'])->name('admin.client-testimonial.edit');
    Route::put('client-testimonial/{id}', [\App\Http\Controllers\admin\ClientTestimonialController::class, 'update'])->name('admin.client-testimonial.update');
    Route::delete('client-testimonial/{id}', [\App\Http\Controllers\admin\ClientTestimonialController::class, 'destroy'])->name('admin.client-testimonial.destroy');

    // Software Products Management Routes
    Route::get('software', [\App\Http\Controllers\admin\SoftwareProductController::class, 'index'])->name('admin.software.index');
    Route::get('software/create', [\App\Http\Controllers\admin\SoftwareProductController::class, 'create'])->name('admin.software.create');
    Route::post('software', [\App\Http\Controllers\admin\SoftwareProductController::class, 'store'])->name('admin.software.store');
    Route::get('software/{id}/edit', [\App\Http\Controllers\admin\SoftwareProductController::class, 'edit'])->name('admin.software.edit');
    Route::put('software/{id}', [\App\Http\Controllers\admin\SoftwareProductController::class, 'update'])->name('admin.software.update');
    Route::delete('software/{id}', [\App\Http\Controllers\admin\SoftwareProductController::class, 'destroy'])->name('admin.software.destroy');

    // Software Support Settings Routes
    Route::get('software-support-settings', [\App\Http\Controllers\admin\SoftwareSupportSettingsController::class, 'edit'])->name('admin.software-support-settings.edit');
    Route::put('software-support-settings', [\App\Http\Controllers\admin\SoftwareSupportSettingsController::class, 'update'])->name('admin.software-support-settings.update');

    // Form Submissions Management (Read-only)
    Route::get('newsletter', [\App\Http\Controllers\admin\NewsletterController::class, 'index'])->name('newsletter.index');
    Route::get('newsletter/{id}', [\App\Http\Controllers\admin\NewsletterController::class, 'show'])->name('newsletter.show');
    Route::delete('newsletter/{id}', [\App\Http\Controllers\admin\NewsletterController::class, 'destroy'])->name('newsletter.destroy');
    Route::get('newsletter/status/{id}', [\App\Http\Controllers\admin\NewsletterController::class, 'updateStatus'])->name('newsletter.status');

    Route::get('technicalsupport', [\App\Http\Controllers\admin\TechnicalSupportController::class, 'index'])->name('technicalsupport.index');
    Route::get('technicalsupport/{id}', [\App\Http\Controllers\admin\TechnicalSupportController::class, 'show'])->name('technicalsupport.show');
    Route::delete('technicalsupport/{id}', [\App\Http\Controllers\admin\TechnicalSupportController::class, 'destroy'])->name('technicalsupport.destroy');
    Route::get('technicalsupport/status/{id}', [\App\Http\Controllers\admin\TechnicalSupportController::class, 'updateStatus'])->name('technicalsupport.status');

    // Technical Support Services Management Routes
    Route::resource('technicalsupportservice', \App\Http\Controllers\admin\TechnicalSupportServiceController::class);

    Route::get('complain', [\App\Http\Controllers\admin\ComplainController::class, 'index'])->name('complain.index');
    Route::get('complain/{id}', [\App\Http\Controllers\admin\ComplainController::class, 'show'])->name('complain.show');
    Route::delete('complain/{id}', [\App\Http\Controllers\admin\ComplainController::class, 'destroy'])->name('complain.destroy');
    Route::get('complain/status/{id}', [\App\Http\Controllers\admin\ComplainController::class, 'updateStatus'])->name('complain.status');

    Route::get('softwarerequest', [\App\Http\Controllers\admin\SoftwareRequestController::class, 'index'])->name('softwarerequest.index');
    Route::get('softwarerequest/{id}', [\App\Http\Controllers\admin\SoftwareRequestController::class, 'show'])->name('softwarerequest.show');
    Route::delete('softwarerequest/{id}', [\App\Http\Controllers\admin\SoftwareRequestController::class, 'destroy'])->name('softwarerequest.destroy');
    Route::get('softwarerequest/status/{id}', [\App\Http\Controllers\admin\SoftwareRequestController::class, 'updateStatus'])->name('softwarerequest.status');

    Route::get('askexpert', [\App\Http\Controllers\admin\AskExpertController::class, 'index'])->name('askexpert.index');
    Route::get('askexpert/{id}', [\App\Http\Controllers\admin\AskExpertController::class, 'show'])->name('askexpert.show');
    Route::delete('askexpert/{id}', [\App\Http\Controllers\admin\AskExpertController::class, 'destroy'])->name('askexpert.destroy');
    Route::get('askexpert/status/{id}', [\App\Http\Controllers\admin\AskExpertController::class, 'updateStatus'])->name('askexpert.status');

    // Consultation Request Management Routes
    Route::get('consultation-request', [\App\Http\Controllers\admin\ConsultationRequestController::class, 'index'])->name('consultation-request.index');
    Route::get('consultation-request/{id}', [\App\Http\Controllers\admin\ConsultationRequestController::class, 'show'])->name('consultation-request.show');
    Route::delete('consultation-request/{id}', [\App\Http\Controllers\admin\ConsultationRequestController::class, 'destroy'])->name('consultation-request.destroy');

    // Ask Expert Page Management Routes
    Route::get('askexpertpage', [\App\Http\Controllers\admin\AskExpertPageController::class, 'index'])->name('askexpertpage.index');
    Route::get('askexpertpage/create', [\App\Http\Controllers\admin\AskExpertPageController::class, 'create'])->name('askexpertpage.create');
    Route::post('askexpertpage', [\App\Http\Controllers\admin\AskExpertPageController::class, 'store'])->name('askexpertpage.store');

    // Ask Expert Topics Management Routes
    Route::resource('askexperttopic', \App\Http\Controllers\admin\AskExpertTopicController::class);

    // Ask Expert Experts Management Routes
    Route::resource('askexpertexpert', \App\Http\Controllers\admin\AskExpertExpertController::class);

    Route::get('dealership', [\App\Http\Controllers\admin\DealershipController::class, 'index'])->name('dealership.index');
    Route::get('dealership/{id}', [\App\Http\Controllers\admin\DealershipController::class, 'show'])->name('dealership.show');
    Route::delete('dealership/{id}', [\App\Http\Controllers\admin\DealershipController::class, 'destroy'])->name('dealership.destroy');
    Route::get('dealership/status/{id}', [\App\Http\Controllers\admin\DealershipController::class, 'updateStatus'])->name('dealership.status');

    Route::get('registration', [\App\Http\Controllers\admin\RegistrationController::class, 'index'])->name('registration.index');
    Route::get('registration/{id}', [\App\Http\Controllers\admin\RegistrationController::class, 'show'])->name('registration.show');
    Route::delete('registration/{id}', [\App\Http\Controllers\admin\RegistrationController::class, 'destroy'])->name('registration.destroy');
    Route::get('registration/status/{id}', [\App\Http\Controllers\admin\RegistrationController::class, 'updateStatus'])->name('registration.status');

    // Registration Benefits Management Routes
    Route::resource('registration-benefit', \App\Http\Controllers\admin\RegistrationBenefitController::class);
    Route::put('deactive/{id}', [AdminUser::class, 'updatedeactive'])->name('adminuser.updatedeactive');
    Route::get('/ajaxsearch', [MenuController::class, 'searchajax'])->name('menu.ajaxsearch');

    // Contact Sidebar Management Routes
    Route::get('contact-sidebar/edit', [\App\Http\Controllers\admin\ContactSidebarController::class, 'edit'])->name('contact-sidebar.edit');
    Route::put('contact-sidebar', [\App\Http\Controllers\admin\ContactSidebarController::class, 'update'])->name('contact-sidebar.update');
});
