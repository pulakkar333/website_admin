<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/menus', [\App\Http\Controllers\Api\MenuController::class, 'index']);
Route::post('/contact', [\App\Http\Controllers\frontend\HomeController::class, 'contactmail']);


Route::get('/footermenu', [\App\Http\Controllers\Api\MenuController::class, 'menus1']);
Route::get('/projects', [\App\Http\Controllers\Api\ActivityController::class, 'index']);
Route::get('/faq', [\App\Http\Controllers\Api\FaqController::class, 'index']);

Route::get('/faq/{slug}', [\App\Http\Controllers\Api\FaqController::class, 'details']);
Route::get('/packagepricing', [\App\Http\Controllers\Api\packagepricing::class, 'index']);
Route::get('/packagepricing/{slug}', [\App\Http\Controllers\Api\PackagePricingController::class, 'details']);

Route::get('/technology', [\App\Http\Controllers\Api\TechnologyController::class, 'index']);
Route::get('/technology/{slug}', [\App\Http\Controllers\Api\TechnologyController::class, 'details']);
Route::get('/webprocess', [\App\Http\Controllers\Api\WebProcessController::class, 'index']);
Route::get('/webprocess/{slug}', [\App\Http\Controllers\Api\WebProcessController::class, 'details']);
Route::get('/clientbenifits', [\App\Http\Controllers\Api\ClientBenifitsController::class, 'index']);
Route::get('/clientbenifits/{slug}', [\App\Http\Controllers\Api\ClientBenifitsController::class, 'details']);
Route::get('/clients', [\App\Http\Controllers\Api\PhotoController::class, 'index']);
Route::get('/news', [\App\Http\Controllers\Api\NewsController::class, 'index']);
Route::get('/news/{slug}', [\App\Http\Controllers\Api\NewsController::class, 'details']);
Route::get('/page/{slug}', [\App\Http\Controllers\Api\PageController::class, 'details']);

Route::get('/slider', [\App\Http\Controllers\Api\SliderController::class, 'index']);
Route::get('/career', [\App\Http\Controllers\Api\CareerController::class, 'index']);
Route::get('/careerDetails/{slug}', [\App\Http\Controllers\Api\CareerController::class, 'details']);
Route::get('/career/departments', [\App\Http\Controllers\Api\CareerController::class, 'getDepartments']);
Route::get('/career/locations', [\App\Http\Controllers\Api\CareerController::class, 'getLocations']);
Route::get('/photo', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('/photo/{slug}', [\App\Http\Controllers\Api\CategoryController::class, 'details']);
Route::get('/video', [\App\Http\Controllers\Api\VideoController::class, 'index']);
Route::get('/Management', [\App\Http\Controllers\Api\ManagementController::class, 'index']);
Route::get('/solution', [\App\Http\Controllers\Api\ServiceController::class, 'index']);
Route::get('/testimonials', [\App\Http\Controllers\Api\TestimonialsController::class, 'index']);

Route::get('/solution/{slug}', [\App\Http\Controllers\Api\ServiceController::class, 'details']);
Route::get('/featured', [\App\Http\Controllers\Api\FeatureController::class, 'index']);
Route::get('/featured/{slug}', [\App\Http\Controllers\Api\FeatureController::class, 'details']);
Route::get('/featuredSlug/{slug}', [\App\Http\Controllers\Api\FeatureController::class, 'detailsSlug']);

Route::get('/qualityservice', [\App\Http\Controllers\Api\QualityServiceController::class, 'index']);
Route::get('/qualityservice/{slug}', [\App\Http\Controllers\Api\QualityServiceController::class, 'details']);
Route::get('/qualityserviceSlug/{slug}', [\App\Http\Controllers\Api\QualityServiceController::class, 'detailsSlug']);

Route::get('/object1', [\App\Http\Controllers\Api\ObjectsController::class, 'object1']);
Route::get('/object2', [\App\Http\Controllers\Api\ObjectsController::class, 'object2']);
Route::get('/about/{slug}', [\App\Http\Controllers\Api\ObjectsController::class, 'details']);
Route::get('/objects3', [\App\Http\Controllers\Api\ObjectsController::class, 'object3']);
Route::get('/objects5', [\App\Http\Controllers\Api\ObjectsController::class, 'objects5']);
Route::get('/objects6', [\App\Http\Controllers\Api\ObjectsController::class, 'objects6']);
Route::get('/footercontact', [\App\Http\Controllers\Api\OthersController::class, 'others2']);
Route::get('/footerother', [\App\Http\Controllers\Api\OthersController::class, 'others6']);
Route::get('/statistics', [\App\Http\Controllers\Api\StatisticController::class, 'index']);
Route::get('/statistics/formatted', [\App\Http\Controllers\Api\StatisticController::class, 'formatted']);
Route::get('/statistics/{key}', [\App\Http\Controllers\Api\StatisticController::class, 'show']);
Route::get('/social', [\App\Http\Controllers\Api\OthersController::class, 'others7']);
Route::post('/apply', [\App\Http\Controllers\Api\ApplicationController::class, 'store']);
Route::get('/pcategory', [\App\Http\Controllers\Api\ParentCategoryController::class, 'index']);
Route::get('/pcategory/{id}', [\App\Http\Controllers\Api\ParentCategoryController::class, 'show']);
Route::get('/scategory', [\App\Http\Controllers\Api\SubCategoryController::class, 'index']);
Route::get('/scategory/{id}', [\App\Http\Controllers\Api\SubCategoryController::class, 'show']);
Route::get('/item', [\App\Http\Controllers\Api\ItemController::class, 'index']);
Route::get('/item/{slug}', [\App\Http\Controllers\Api\ItemController::class, 'show']);
Route::get('/item/{id}/download-brochure', [\App\Http\Controllers\Api\ItemController::class, 'downloadBrochure']);
Route::get('/latest-products', [\App\Http\Controllers\Api\ItemController::class, 'latestProducts']);
Route::get('/item/{id}/related-products', [\App\Http\Controllers\Api\ItemController::class, 'relatedProducts']);


// Partners API
Route::get('/partners', [\App\Http\Controllers\Api\PartnerController::class, 'index']);
Route::get('/partners/{id}', [\App\Http\Controllers\Api\PartnerController::class, 'show']);

// Why Work With Us Features API
Route::get('/why-work-with-us', [\App\Http\Controllers\Api\WhyWorkWithUsController::class, 'index']);
Route::get('/why-work-with-us/{id}', [\App\Http\Controllers\Api\WhyWorkWithUsController::class, 'show']);

// Core Values API
Route::get('/core-values', [\App\Http\Controllers\Api\CoreValueController::class, 'index']);
Route::get('/core-values/{id}', [\App\Http\Controllers\Api\CoreValueController::class, 'show']);

// Milestones API
Route::get('/milestones', [\App\Http\Controllers\Api\MilestoneController::class, 'index']);
Route::get('/milestones/{id}', [\App\Http\Controllers\Api\MilestoneController::class, 'show']);

// Career Benefits API

Route::get('/career-benefits', [\App\Http\Controllers\Api\CareerBenefitController::class, 'index']);
Route::get('/career-benefits/{id}', [\App\Http\Controllers\Api\CareerBenefitController::class, 'show']);

// Departments API
Route::get('/departments', [\App\Http\Controllers\Api\DepartmentController::class, 'index']);
Route::get('/departments/{id}', [\App\Http\Controllers\Api\DepartmentController::class, 'show']);

// Regional Offices API
Route::get('/regional-offices', [\App\Http\Controllers\Api\RegionalOfficeController::class, 'index']);
Route::get('/regional-offices/{id}', [\App\Http\Controllers\Api\RegionalOfficeController::class, 'show']);

// Newsletter API
Route::post('/newsletter', [\App\Http\Controllers\Api\NewsletterController::class, 'store']);

// Client Categories API

Route::get('/client-categories', [\App\Http\Controllers\Api\ClientCategoryController::class, 'index']);
Route::get('/client-categories/{slug}', [\App\Http\Controllers\Api\ClientCategoryController::class, 'show']);
Route::get('/clients-by-category', [\App\Http\Controllers\Api\ClientCategoryController::class, 'getClientsByCategory']);
Route::get('/clientsphoto', [\App\Http\Controllers\Api\ClientsPhotoController::class, 'index']);

// Form Submission APIs
Route::post('/technical-support', [\App\Http\Controllers\Api\TechnicalSupportController::class, 'store']);
Route::post('/complain', [\App\Http\Controllers\Api\ComplainController::class, 'store']);

// Technical Support Services API
Route::get('/technical-support-services', [\App\Http\Controllers\Api\TechnicalSupportServiceController::class, 'index']);
Route::get('/technical-support-services/{id}', [\App\Http\Controllers\Api\TechnicalSupportServiceController::class, 'show']);
Route::post('/software-request', [\App\Http\Controllers\Api\SoftwareRequestController::class, 'store']);
Route::post('/ask-expert', [\App\Http\Controllers\Api\AskExpertController::class, 'store']);
Route::post('/dealership', [\App\Http\Controllers\Api\DealershipController::class, 'store']);
Route::get('/dealership/business-types', [\App\Http\Controllers\Api\DealershipController::class, 'getBusinessTypes']);

Route::post('/product-registration', [\App\Http\Controllers\Api\RegistrationController::class, 'store']);
Route::post('/registration', [\App\Http\Controllers\Api\RegistrationController::class, 'store']);

// Registration Benefits API
Route::get('/registration-benefits', [\App\Http\Controllers\Api\RegistrationBenefitController::class, 'index']);
Route::get('/registration-benefits/{id}', [\App\Http\Controllers\Api\RegistrationBenefitController::class, 'show']);

// Dealership Page Content APIs
Route::get('/dealership-page-setting', [\App\Http\Controllers\Api\DealershipPageSettingController::class, 'index']);
Route::get('/why-partner-with-us', [\App\Http\Controllers\Api\WhyPartnerWithUsController::class, 'index']);
Route::get('/why-partner-with-us/{id}', [\App\Http\Controllers\Api\WhyPartnerWithUsController::class, 'show']);
Route::get('/dealership-categories', [\App\Http\Controllers\Api\DealershipCategoryController::class, 'index']);
Route::get('/dealership-categories/{id}', [\App\Http\Controllers\Api\DealershipCategoryController::class, 'show']);
Route::get('/eligibility-requirements', [\App\Http\Controllers\Api\EligibilityRequirementController::class, 'index']);
Route::get('/eligibility-requirements/{id}', [\App\Http\Controllers\Api\EligibilityRequirementController::class, 'show']);
Route::get('/application-processes', [\App\Http\Controllers\Api\ApplicationProcessController::class, 'index']);
Route::get('/application-processes/{id}', [\App\Http\Controllers\Api\ApplicationProcessController::class, 'show']);
Route::get('/partner-support-benefits', [\App\Http\Controllers\Api\PartnerSupportBenefitController::class, 'index']);
Route::get('/partner-support-benefits/{id}', [\App\Http\Controllers\Api\PartnerSupportBenefitController::class, 'show']);
Route::get('/dealership-contact', [\App\Http\Controllers\Api\DealershipContactController::class, 'index']);

// Footer APIs
Route::get('/footer-contact', [\App\Http\Controllers\Api\FooterContactController::class, 'index']);
Route::get('/footer-addresses', [\App\Http\Controllers\Api\FooterAddressController::class, 'index']);
Route::get('/footer-addresses/{id}', [\App\Http\Controllers\Api\FooterAddressController::class, 'show']);

// Settings API
Route::get('/settings', [\App\Http\Controllers\Api\SettingController::class, 'index']);
Route::get('/settings/{key}', [\App\Http\Controllers\Api\SettingController::class, 'show']);
Route::post('/settings/multiple', [\App\Http\Controllers\Api\SettingController::class, 'getMultiple']);

// Leadership API
Route::get('/leadership', [\App\Http\Controllers\Api\LeadershipController::class, 'index']);
Route::get('/leadership/{id}', [\App\Http\Controllers\Api\LeadershipController::class, 'show']);

// Managing Director API
Route::get('/managing-director', [\App\Http\Controllers\Api\ManagingDirectorController::class, 'index']);

// Client Testimonials API

Route::get('/client-testimonials', [\App\Http\Controllers\Api\ClientTestimonialController::class, 'index']);
Route::get('/client-testimonials/{id}', [\App\Http\Controllers\Api\ClientTestimonialController::class, 'show']);
Route::post('/client-testimonials', [\App\Http\Controllers\Api\ClientTestimonialController::class, 'store']);
Route::put('/client-testimonials/{id}', [\App\Http\Controllers\Api\ClientTestimonialController::class, 'update']);
Route::delete('/client-testimonials/{id}', [\App\Http\Controllers\Api\ClientTestimonialController::class, 'destroy']);

// Software Products API

Route::get('/software', [\App\Http\Controllers\Api\SoftwareProductController::class, 'index']);
Route::get('/software/{id}/download', [\App\Http\Controllers\Api\SoftwareProductController::class, 'download']);
Route::get('/software/{id}/download-pdf', [\App\Http\Controllers\Api\SoftwareProductController::class, 'downloadPdf']);



Route::get('/software/{slug}', [\App\Http\Controllers\Api\SoftwareProductController::class, 'show']);
Route::get('/software-support-settings', [\App\Http\Controllers\Api\SoftwareProductController::class, 'supportSettings']);
Route::post('/software', [\App\Http\Controllers\Api\SoftwareProductController::class, 'store']);
Route::put('/software/{id}', [\App\Http\Controllers\Api\SoftwareProductController::class, 'update']);
Route::delete('/software/{id}', [\App\Http\Controllers\Api\SoftwareProductController::class, 'destroy']);

// Corporate Ecosystem API
Route::get('/corporate-ecosystem', [\App\Http\Controllers\Api\CorporateEcosystemController::class, 'index']);

// Ask Expert APIs
Route::get('/ask-expert-page', [\App\Http\Controllers\Api\AskExpertPageController::class, 'index']);
Route::get('/ask-expert-topics', [\App\Http\Controllers\Api\AskExpertTopicController::class, 'index']);
Route::get('/ask-expert-topics/{id}', [\App\Http\Controllers\Api\AskExpertTopicController::class, 'show']);
Route::get('/ask-expert-experts', [\App\Http\Controllers\Api\AskExpertExpertController::class, 'index']);
Route::get('/ask-expert-experts/{id}', [\App\Http\Controllers\Api\AskExpertExpertController::class, 'show']);

// Consultation Request API
Route::post('/consultation-request', [\App\Http\Controllers\Api\ConsultationRequestController::class, 'store']);
Route::get('/contact-sidebar', [\App\Http\Controllers\Api\ContactSidebarController::class, 'index']);

