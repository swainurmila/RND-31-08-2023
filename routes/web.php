<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ChairpersonController;
use App\Http\Controllers\ConrtrollCellController;
use App\Http\Controllers\ControlcellApplicationController;
use App\Http\Controllers\CoSupervisor;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExamCellController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JuniorExecutiveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\NodalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PHDStudentController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VcController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => ''], function () {
    // Landing page, captcha and Dynamic webpage creation routes
    Route::get('/', [HomeController::class, 'index'])->name('frontend');
    Route::get('refresh-captcha', [LoginController::class, 'refreshCaptcha'])->name('refreshCaptcha');
    Route::get('webpages/{slug}', [PageController::class, 'PageDisplay'])->name('page.dispaly');

    // Login, logout related routes
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('submit-login', [LoginController::class, 'postLogin'])->name('login.post');
    Route::get('/logout-log', [LoginController::class, 'logout'])->name('logout_log');
    Route::get('/logout', [PageController::class, 'logout_home'])->name('logout_home');

    // Forget Password
    Route::get('/forget-password', [LoginController::class, 'view_forget'])->name('vew.forget');
    Route::post('/forget-password-submit', [LoginController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}/{logtype}', [LoginController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [LoginController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    // Register
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register-post', [RegisterController::class, 'store'])->name('register.store');
    // Route::get('refresh-captcha', [RegisterController::class, 'refreshCaptcha'])->name('reg.refreshCaptcha'); // Might required
});

//Route::get('send-mail', [MailSend::class, 'mailsend']);
Route::group(['middleware' => 'auth'], function () {
    // Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    // Admin Routes Pages
    Route::get('/nodal-list', [AdminController::class, 'nodal_list'])->name('nodal.list');
    Route::group(['prefix' => 'pages'], function () {
        Route::get('', [PageController::class, 'index'])->name('pages');
        Route::get('create', [PageController::class, 'create'])->name('pages.create');
        Route::post('create', [PageController::class, 'store'])->name('pages.store');
        Route::get('edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
        Route::post('edit/{id}', [PageController::class, 'update'])->name('pages.update');
        Route::post('destroy', [PageController::class, 'destroy'])->name('pages.destroy');
    });

    // Admin Routes Menus
    Route::group(['prefix' => ''], function () {
        Route::get('/menus', [PageController::class, 'MenuIndex'])->name('menus');
        Route::get('/edit-menu', [PageController::class, 'MenuEdit'])->name('menudata');
        Route::post('/update-menu', [PageController::class, 'MenuUpdate'])->name('menu.update');
        Route::get('/delete-menu/{id?}', [PageController::class, 'DeleteMenu'])->name('menu.delete');
    });

    // Admin Routes Announcement
    Route::group(['prefix' => 'announcements'], function () {
        Route::get('', [AnnouncementController::class, 'index'])->name('announcements');
        Route::get('create', [AnnouncementController::class, 'create'])->name('announcements.create');
        Route::post('create', [AnnouncementController::class, 'store'])->name('announcements.store');
        Route::get('edit/{id}', [AnnouncementController::class, 'edit'])->name('announcements.edit');
        Route::post('edit/{id}', [AnnouncementController::class, 'update'])->name('announcements.update');
        Route::post('destroy', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    });

    // Admin Routes Department
    Route::group(['prefix' => 'departments'], function () {
        Route::get('', [DepartmentController::class, 'index'])->name('departments');
        Route::get('create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('create', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::post('edit/{id}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::post('destroy', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });

    // ======= Role ====
    Route::group(['prefix' => ''], function () {
        Route::get('/roles', [MasterController::class, 'index'])->name('roles');
        Route::post('/add-role', [MasterController::class, 'add_role'])->name('add.role');
        Route::get('/edit-role', [MasterController::class, 'edit_role'])->name('edit.role');
        Route::post('/update-role', [MasterController::class, 'update_role'])->name('upddate.role');
        Route::post('/delete-role', [MasterController::class, 'delete_role'])->name('delete.role');
    });

    // ======= user =====
    Route::group(['prefix' => ''], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::post('/add-user', [UserController::class, 'add_user'])->name('add.user');
        Route::get('/edit-user', [UserController::class, 'edit_user'])->name('edit.user');
        Route::post('/update-user', [UserController::class, 'update_user'])->name('update.user');
        Route::post('/delete-user', [UserController::class, 'delete_user'])->name('delete.user');
    });

    // ======= PortalController =====
    Route::resource('portal', PortalController::class)->names([
        'index'   => 'portal.index',
        'create'  => 'portal.create',
        'store'   => 'portal.store',
        'edit'    => 'portal.edit',
        'update'  => 'portal.update',
        'destroy' => 'portal.destroy',
    ]);
    Route::post('portal/delete', [PortalController::class, 'DeletePortal'])->name('portal.delete');

    // Students
    Route::group(['prefix' => ''], function () {
        Route::get('/applied-application', [AdminController::class, 'stuappliedApplication'])->name('admin.stu.applied-application');
        Route::get('/student-approved/application/', [AdminController::class, 'stuApprovedApplication'])->name('admin.stu.approve-application');
        Route::get('/student/preview-application/{id}', [AdminController::class, 'StuPreviewApplication'])->name('admin.stu.preview-application');
    });

    // Supervisors
    Route::group(['prefix' => ''], function () {
        Route::get('/supervisor-application', [AdminController::class, 'SupallApplication'])->name('supervisor-application');
        Route::get('/supervisor/approved-application', [AdminController::class, 'supervisor_approvedApplication'])->name('supervisor.approved-application');
        Route::get('/supervisor/preview-application/{id}', [AdminController::class, 'SupPreviewApplication'])->name('admin.sup.preview-application');
    });

    // Cosupervisors
    Route::group(['prefix' => 'cosupervisor'], function () {
        Route::get('/applied-application', [AdminController::class, 'cosupervisor_appliedApplication'])->name('admin.cosup.applied-application');
        Route::get('/approved-application', [AdminController::class, 'cosupervisor_approvedApplication'])->name('admin.cosup.approved-application');
        Route::get('/preview-application/{id}', [AdminController::class, 'coSupPreviewApplication'])->name('admin.cosup.preview-application');
    });

    //
    Route::group(['prefix' => ''], function () {
        Route::get('/phd-student-registration', [AdminController::class, 'uploadStudentRegistration'])->name('phd-student-registration');
        Route::post('/phd-official-document-verified', [AdminController::class, 'uploadStudentRegistrationForm'])->name('phd-official-document-verified');
    });
    Route::group(['prefix' => 'stu'], function () {
        Route::get('/entrance-application', [AdminController::class, 'entranceApplicationList'])->name('stu.entrance-application');
        Route::get('/entrance-application-view/{id}', [AdminController::class, 'entranceApplicationView'])->name('stu.entrance-application-view');
    });

});

Route::group(['prefix' => 'phdstudent', 'middleware' => 'role:student'], function () {
    Route::view('/dashboard', 'admin.dashboard')->name('student.dashboard');
    // Route::get('', [PHDStudentController::class, 'index'])->name('phdStudents');
    // Route::get('/create', [PHDStudentController::class, 'create'])->name('phdStudents.create');
    Route::get('/form-view/{id}', [PHDStudentController::class, 'phdstudentform'])->name('phdStudents.view');
    Route::post('/store', [PHDStudentController::class, 'store'])->name('phdStudents.store');
    Route::post('/upload/certificate', [PHDStudentController::class, 'upload_certi'])->name('phdStudents.certi');
    Route::post('/upload/marksheet', [PHDStudentController::class, 'upload_marksheet'])->name('phdStudents.marksheet');
    Route::post('/upload/noc_certificate', [PHDStudentController::class, 'upload_noc'])->name('phdStudents.noccerti');
    Route::post('/upload/other-documents', [PHDStudentController::class, 'upload_other'])->name('phdStudents.other');
    Route::get('/application-status', [PHDStudentController::class, 'applicationStatus'])->name('phdStudents.applicationStatus');
    Route::get('/find-form', [PHDStudentController::class, 'findForm'])->name('phdStudents.findForm');
    Route::get('/find-supervisor', [PHDStudentController::class, 'find_Supervisor'])->name('find.supervisor');
    Route::post('/new-supervisor-add', [PHDStudentController::class, 'Supervisor_add'])->name('supervisor.add');

    Route::get('/student-form-draft/{id}', [PHDStudentController::class, 'stu_draft_data'])->name('stu.draft');
    Route::post('/student-draft-store/{id}', [PHDStudentController::class, 'stu_draft_store'])->name('stu.draft.store');
    Route::post('/delete-qual-certi', [PHDStudentController::class, 'delete_stu_certificate'])->name('stu.quali.certi');
    Route::post('/delete-orga-certi', [PHDStudentController::class, 'delete_stu_orga_certi'])->name('stu.orga.certi');
    Route::post('/delete-other-certi', [PHDStudentController::class, 'delete_stu_other_certi'])->name('stu.other.certi');
    Route::get('phdStudents/preview/{id}', [PHDStudentController::class, 'stu_preview'])->name('stu.preview');
    Route::post('phdStudents/preview/submit', [PHDStudentController::class, 'stu_preview_submit'])->name('stu.preview.submit');

    Route::get('/form-apply', [PHDStudentController::class, 'stu_apply'])->name('stu_apply');
    Route::post('/information', [PHDStudentController::class, 'store_info'])->name('store.personal.info');
    Route::get('/draft-info/{id}', [PHDStudentController::class, 'draft_info'])->name('draft.info');
    Route::post('/draft-info-store/{id}', [PHDStudentController::class, 'draft_info_store'])->name('draft.info.store');
    //Route::get('/asd', [PHDStudentController::class, 'asdf_demo'])->name('draft.ddd');

    // Route::get('/sss/{$id}', [PHDStudentController::class, 'draft_information']);

    Route::get('/education-qualification/{id}', [PHDStudentController::class, 'education_view'])->name('education.view');
    Route::post('/store-education/{id}', [PHDStudentController::class, 'store_education'])->name('store.education');
    Route::get('/draft-education/{id}', [PHDStudentController::class, 'draft_education'])->name('draft.education');
    Route::post('/draft-education-store/{id}', [PHDStudentController::class, 'draft_education_store'])->name('draft.education.store');
    Route::get('/student-preview/{id}', [PHDStudentController::class, 'student_view'])->name('student.view');

    Route::get('phdStudents/payment', [PayController::class, 'stu_payment'])->name('stu.payment');
    Route::get('/cashfree/payments/success', [PayController::class, 'success'])->name('cashfree.success');

    Route::get('/instamojo_redirect', [PayController::class, 'instamojo_redirect']);
    Route::get('phdStudents/payemt_status', [PayController::class, 'payemt_status'])->name('stu.payemt.status');

    Route::get('/final-priview/{id}', [PHDStudentController::class, 'final_preview'])->name('final.preview');
    Route::get('/invoice/{id}', [PHDStudentController::class, 'invoice'])->name('invoice');
    Route::get('/dsc-experts-list/{id}', [PHDStudentController::class, 'show_dsc_of_student'])->name('show.students.dsc');
    Route::post('/final-submit/{id}', [PHDStudentController::class, 'final_submit'])->name('final.submit');
    Route::get('/student-enrollment-view/{id}', [PHDStudentController::class, 'enrollment_view'])->name('enrollment.view');

    // Extention complete Work
    Route::get('/ext-to-complete-work', [PHDStudentController::class, 'ext_to_complete_work'])->name('ext_to_complete_work');
    Route::get('/extention-to-work-view/{id}', [PHDStudentController::class, 'extention_to_work_view'])->name('extention.to.work.view');
    Route::post('/extention-to-work-store', [PHDStudentController::class, 'extention_work_store'])->name('extention.work.store');
    Route::get('/extention-to-work-apply', [PHDStudentController::class, 'extention_work_apply'])->name('extention.work.apply');

    // student Leave =====
    Route::get('/special-leave', [PHDStudentController::class, 'special_leave'])->name('special_leave');
    Route::get('/special-leave-store', [PHDStudentController::class, 'special_leave_store'])->name('special.leave.store');
    Route::get('/special-leave-listing', [PHDStudentController::class, 'special_leave_listing'])->name('special.leave.list');
    Route::get('/special-leave-view/{id}', [PHDStudentController::class, 'special_leave_view'])->name('special.leave.view');

    //Discontinuation as Ph.D code
    Route::get('/discontinue-phd', [PHDStudentController::class, 'discontinue_phd'])->name('discontinue_phd');
    Route::post('/discontinue-phd-store', [PHDStudentController::class, 'discontinue_phd_store'])->name('discontinue_phd_store');
    Route::get('/discontinue-request', [PHDStudentController::class, 'discontinueRequest'])->name('discontinue-request');
    Route::get('/discontinue-registration/{id}', [PHDStudentController::class, 'discontinueRegistration'])->name('view-discontinue-registration');

    // semester work
    Route::get('/semister-registration-fee/{id}', [PHDStudentController::class, 'semister_reg_fee'])->name('semister.fee');
    Route::get('/semister-registration-payment/{id}', [PayController::class, 'semister_reg_pay'])->name('semister.pay');
    Route::get('/semister-payment-invoices/{id}', [PHDStudentController::class, 'semister_pay_invoice'])->name('semister.invoice');

    Route::get('/semister-nodal-fee/{id}', [PHDStudentController::class, 'sem_nodal_fee'])->name('semister.nodal');
    Route::post('/semister-nodal-fee-upload', [PHDStudentController::class, 'sem_nodal_fee_upload'])->name('semister.nodal.upload');
    Route::get('/sem-progress-report', [PHDStudentController::class, 'semProgressReport'])->name('sem_progress_report');
    Route::post('/sem-progress-submit', [PHDStudentController::class, 'SemProgSubmit'])->name('sem_progress_submit');
    Route::get('/sem-progress-listing', [PHDStudentController::class, 'SemProgListing'])->name('sem_progress_listing');
    Route::get('/sem-progress-view/{id}', [PHDStudentController::class, 'SemProgView'])->name('sem_progress_view');
    Route::post('/upload/attached-copy-publication', [PHDStudentController::class, 'attached_copy'])->name('sem.attached.copy');

    // Route::get('/enrollment-phd-programme', [PHDStudentController::class, 'enrollemtOfPhdProggramme'])->name('enrollment-phd-programme');
    Route::get('/change-title-researchwork', [PHDStudentController::class, 'changeTitleRearchWork'])->name('change-title-researchwork');
    Route::post('/change-reserach-title-submit', [PHDStudentController::class, 'changeResearchSubmit'])->name('change-reserach-title-submit');
   
   
    Route::post('/fetch-coursework', [PHDStudentController::class, 'fetchCourseWork'])->name('fetch-coursework');
    Route::post('/fetch-credit', [PHDStudentController::class, 'fetchCourseWorkCredit'])->name('fetch-credit');
    //Semester Registration 
    Route::get('/student-semester-list', [PHDStudentController::class, 'semester_list'])->name('semester.list');
    Route::get('/semister-registration-form', [PHDStudentController::class, 'semisterRegistrationForm'])->name('semister-registration-form');
    Route::post('/semester-registration-form-submit', [PHDStudentController::class, 'semisterRegistrationFormSubmit'])->name('semester-registration-form-submit');
    Route::get('/semister-registration-payment-form/{id}', [PHDStudentController::class, 'semisterRegistrationPayment'])->name('semister-registration-payment-form');
    Route::post('/semester-registration-payment-submit', [PHDStudentController::class, 'semisterRegistrationPaymentSubmit'])->name('semester-registration-payment-submit');
    Route::post('/semester-bput-payment-submit', [PHDStudentController::class, 'semisterBputPaymentSubmit'])->name('semester-bput-payment-submit');
    Route::get('semester/payment/{id}', [PHDStudentController::class, 'semesterPayment'])->name('semester-payment.payment');
    Route::get('/semister-registration-preview/{id}', [PHDStudentController::class, 'semisterRegistrationPreview'])->name('semister-registration-preview');
    Route::post('/semester-registration-final-submit', [PHDStudentController::class, 'semisterRegisterSubmit'])->name('semester-registration-final-submit');
    Route::get('/semester-register-view/{id}', [PHDStudentController::class, 'semisterRegistrationView'])->name('semester-register-view');

    //Route::get('/student-semester-view', [PHDStudentController::class, 'semester_list_view'])->name('student.semester.view');

    Route::get('/semester-payment-fee/{id}', [PHDStudentController::class, 'semisterPaymentFee'])->name('semester-payment-fee/{id}');
    Route::post('/semister-payment-fee-submit', [PHDStudentController::class, 'semisterPaymentFeeSubmit'])->name('semister-payment-fee-submit');
    Route::get('/payment-page/{id}', [PHDStudentController::class, 'semisterPaymentPage'])->name('payment-page');
    Route::get('/final-payment-student/{id}/{type}', [PHDStudentController::class, 'finalPayment'])->name('final-payment-student/{id}/{type}');
    Route::get('/payment-success-page/{id}', [PHDStudentController::class, 'paymentSuccessPage'])->name('payment-success-page/{id}');

    //change of nodal center
    Route::get('/changeof-nodal-reserach-center', [PHDStudentController::class, 'changeOfNodalResearchCentre'])->name('changeof-nodal-reserach-center');
    Route::post('/changeof-nodal-reserach-center-form', [PHDStudentController::class, 'changeOfNodalResearchCentreForm'])->name('changeof-nodal-reserach-center-form');
    Route::get('/change-nodal-status', [PHDStudentController::class, 'changeNodalStatus'])->name('change-nodal-status');
    Route::get('/view-change-nodal-status/{id}', [PHDStudentController::class, 'viewchangeNodalStatus'])->name('view-change-nodal-status');
    //end

    Route::get('/changeof-research-supervisor', [PHDStudentController::class, 'changeOfResearchSupervisor'])->name('changeof-research-supervisor');
    Route::post('/changeof-research-supervisor-form', [PHDStudentController::class, 'changeOfResearchSupervisorForm'])->name('changeof-research-supervisor-form');
    Route::get('/change-supervisor-view', [PHDStudentController::class, 'viewChangeOfSupervisor'])->name('change-supervisor-view');
    Route::get('/co-supervisor-change-from/{id}', [PHDStudentController::class, 'viewChangeSupervisorForm'])->name('co-supervisor-change-form/{id}');
    Route::get('/changeof-nodal-reserach-centrelist', [PHDStudentController::class, 'changeOfNodalResearchCentreList'])->name('changeof-nodal-reserach-centrelist');
    Route::get('/changeof-nodal-reserach-centre-view/{id}', [PHDStudentController::class, 'changeOfNodalResearchCentreView'])->name('changeof-nodal-reserach-centre-view/{id}');

    Route::get('/my-profile', [PHDStudentController::class, 'myProfile'])->name('my-profile');
    //end
    //renewal registration
    Route::get('/renewal-registration-form', [PHDStudentController::class, 'renewalRegistrationForm'])->name('renewal-registration-form');
    Route::post('/renewal-registration-form-submit', [PHDStudentController::class, 'renewalRegistrationFormSubmit'])->name('renewal-registration-form-submit');
    Route::get('/renewal-request', [PHDStudentController::class, 'renewalRequest'])->name('renewal-request');
    Route::get('/renewal-registration/{id}', [PHDStudentController::class, 'renewalRegistration'])->name('view-renewal-registration');
    // Route::get('/renewal-registration', [PHDStudentController::class, 'renewalRegistration'])->name('view-renewal-registration');
    // end of renewal
    Route::get('/inclusion-co-supervisor', [PHDStudentController::class, 'inclusionCoSupervisor'])->name('inclusion_co_supervisor');
    Route::get('/recommendation-dsc', [PHDStudentController::class, 'recommendationDsc'])->name('recommendation_dsc');
    Route::get('/thesis-submission', [PHDStudentController::class, 'thesisSubmission'])->name('thesis_submission');

    Route::post('/notify-student-details', [PHDStudentController::class, 'update_notify_student_details'])->name('update.notify.student.details');
    Route::post('/notify-student', [PHDStudentController::class, 'notify_student'])->name('notify.student');

    //Coursework Allotment at student
    Route::get('/coursework-allotment-form', [PHDStudentController::class, 'courseworkForm'])->name('coursework-allotment-form');
    Route::post('/coursework-allotment-form', [PHDStudentController::class, 'courseworkFormCreate'])->name('coursework-allotment-form-create');

    //provisional registration DSC recommendation
    Route::get('/provisional_registration', [PHDStudentController::class, 'provisionalRegistration'])->name('provisional_registration');
    Route::post('/provisional_reg_store', [PHDStudentController::class, 'provisionalRegStore'])->name('provisional_reg_store');
    Route::get('/provisional_reg_view', [PHDStudentController::class, 'provisionalRegView'])->name('provisional_reg_view');
    Route::get('/provisional_registration_edit', [PHDStudentController::class, 'provisionalRegistrationEdit'])->name('provisional_registration_edit');
    Route::post('/provisional_reg_update/{id}', [PHDStudentController::class, 'provisionalRegUpdate'])->name('provisional_reg_update');
    
});
Route::get('/notify-reg-office-order/{id}', [JuniorExecutiveController::class, 'reg_office_order'])->name('je.notify-reg-office-order');
Route::group(['prefix' => 'control-cell', 'middleware' => 'role:control_cell'], function () {
    Route::get('/dashboard', [ConrtrollCellController::class, 'dashboard'])->name('controll.cell.dashboard');

    Route::get('/phdStudents', [ConrtrollCellController::class, 'PhdCell_index'])->name('PhdCell.index');
    Route::get('/phdfee-config', [ConrtrollCellController::class, 'feeConfig'])->name('PhdCell.feeConfig');
    Route::get('/view-students/{id}', [ConrtrollCellController::class, 'PhdCell_view_student'])->name('PhdCell.view_student');

    Route::post('/draft-student-store/{id}', [ConrtrollCellController::class, 'draft_student_store'])->name('rndcell.draft_student_store');
    Route::get('/draft-student/{id}', [ConrtrollCellController::class, 'draft_student'])->name('rndcell.draft_student');
    Route::get('/preview-student/{id}', [ConrtrollCellController::class, 'preview_student'])->name('rndcell.preview_student');
    Route::post('/preview-student-submit/{id}', [ConrtrollCellController::class, 'prev_student_subm'])->name('rndcell.prev_student_subm');
    Route::post('/payment-status/{id}', [ConrtrollCellController::class, 'payment_status'])->name('rndcell.payment_status');

    Route::get('/view-supervisor/{id}', [ConrtrollCellController::class, 'view_supervisor'])->name('rndcell.view_supervisor');

    Route::post('/draft-supervisor-store/{id}', [ConrtrollCellController::class, 'draft_supervisor_store'])->name('rndcell.draft_supervisor');
    Route::get('/draft-supervisor/{id}', [ConrtrollCellController::class, 'draft_supervisor'])->name('rndcell.draft_supervisor.data');
    Route::get('/preview-supervisor/{id}', [ConrtrollCellController::class, 'preview_supervisor'])->name('rndcell.preview_supervisor');
    Route::post('/preview-supervisor-submit/{id}', [ConrtrollCellController::class, 'prev_super_subm'])->name('rndcell.prev_super_subm');

    Route::post('/add_remarks/{id}', [PHDStudentController::class, 'PhdCell_add_remarks'])->name('PhdCell.add_remarks');
    Route::get('/supervisor-list', [ConrtrollCellController::class, 'Cell_Sup_List'])->name('rndcell.sup.list');
    Route::get('/supervisor-list', [ConrtrollCellController::class, 'Cell_Sup_List'])->name('rndcell.sup.list');

    Route::get('/nodal', [NodalController::class, 'nodal_index'])->name('nodal');
    Route::post('/add-nodal', [NodalController::class, 'add_nodal'])->name('add.nodal');
    Route::get('/edit-nodal', [NodalController::class, 'edit_nodal'])->name('edit.nodal');
    Route::post('/update-nodal', [NodalController::class, 'update_nodal'])->name('update.nodal');
    Route::post('/delete-nodal', [NodalController::class, 'delete_nodal'])->name('delete.nodal');

    //seme

});

Route::group(['prefix' => 'nodalcentre', 'middleware' => 'role:nodal_center', 'as' => 'nodalcentre.'], function () {
    Route::get('/dashboard', [NodalController::class, 'dashboard'])->name('dashboard');
    Route::get('/applied-application', [NodalController::class, 'appliedApplication'])->name('applied-application');
    //coursewok application
    Route::get('/view-coursework/{id}', [NodalController::class, 'viewCoursework'])->name('view-coursework');
    Route::post('/view-coursework', [NodalController::class, 'viewCourseworkSubmit'])->name('view-coursework-submit');
    Route::post('/view-coursework-update', [NodalController::class, 'viewCourseworkUpdate'])->name('view-coursework-update');
    Route::get('/coursework-dsc-letter/{id}', [NodalController::class, 'dscCourseworkLetter'])->name('coursework-dsc-letter');

    Route::get('/verify-application/{id}', [NodalController::class, 'viewApplication'])->name('verify-application');
    Route::post('/edit-application/{id}', [NodalController::class, 'editApplication'])->name('edit-application');
    Route::get('/preview-application/{id}', [NodalController::class, 'previewApplication'])->name('preview-application');
    Route::post('/approve-application/{id}', [NodalController::class, 'approveApplication'])->name('approve-application');
    Route::get('/all-application', [NodalController::class, 'allApplication'])->name('all-application');
    Route::get('/single-application/{id}', [NodalController::class, 'singleApplication'])->name('single-application');

    //renewal registration
    Route::get('/renewal-request', [NodalController::class, 'renewalRequest'])->name('renewal-request');
    Route::get('/renewal-registration/{id}', [NodalController::class, 'renewalRegistration'])->name('view-renewal-registration');
    // Route::get('/renewal-registration', [NodalController::class, 'renewalRegistration'])->name('view-renewal-registration');
    Route::post('/renewal-registration-store/{id}', [NodalController::class, 'renewalRegistrationStore'])->name('renewal-registration-store');
    // end of renewal

    // semester view
    Route::get('/nodal-semister-listing', [NodalController::class, 'nodal_semester_list'])->name('semester.list');
    Route::get('/nodal-semister-view/{id}', [NodalController::class, 'nodal_semester_view'])->name('semester.view');
    Route::post('/semister-status/{id}', [NodalController::class, 'semester_status'])->name('semester.status');
    Route::get('/semester-prog-dsc-letter/{id}', [NodalController::class, 'dscSemesterLetter'])->name('semester-prog-dsc-letter');

    // === semester progresss

    Route::get('/student-semester-list', [NodalController::class, 'sup_semester_list'])->name('nod.semester.list');
    Route::get('/student-semester-view/{id}', [NodalController::class, 'sup_semester_view'])->name('nod.semester.view');
    Route::post('/student-semester-store/{id}', [NodalController::class, 'sup_semester_store'])->name('nod.semester.store');

    //semester registration
    Route::get('/semester-register', [NodalController::class, 'phd_semester_register'])->name('semester-register');
    Route::get('/semester-register-view/{id}', [NodalController::class, 'phd_semester_register_view'])->name('semester-register-view');
    Route::post('semester-register-store/{id}', [NodalController::class, 'phd_semester_register_store'])->name('semester-register-store');
    
    //discontinuation as phd
    Route::get('/discontinue-request', [NodalController::class, 'discontinueRequest'])->name('discontinue-request');
    Route::get('/discontinue-registration/{id}', [NodalController::class, 'discontinueRegistration'])->name('view-discontinue-registration');
    Route::post('/discontinue-registration-store/{id}', [NodalController::class, 'discontinueRegistrationStore'])->name('discontinue-registration-store');

    //Domain Expert
    Route::get('/domain-request', [NodalController::class, 'domainRequest'])->name('domain-request');
    Route::get('/domain-remark/{id}', [NodalController::class, 'domainRemark'])->name('view-domain-remark');
    Route::post('/domain-remark-store/{id}', [NodalController::class, 'domainRemarkStore'])->name('domain-remark-store');

    // student Leave =====

    Route::get('/special-leave-listing', [NodalController::class, 'special_leave_listing'])->name('leave.list');
    Route::get('/special-leave-view/{id}', [NodalController::class, 'special_leave_view'])->name('leave.view');
    Route::post('/special-leave-status/{id}', [NodalController::class, 'special_leave_status'])->name('leave.status');

    //change reserach supervisor
    Route::get('/change_supervisor', [NodalController::class, 'change_supervisor_request'])->name('change_supervisor');
    Route::get('/view_change_supervisor/{id}', [NodalController::class, 'view_change_supervisor'])->name('view_change_supervisor');
    Route::post('/change_supervisor_remark/{id}', [NodalController::class, 'change_supervisor_remark'])->name('change_supervisor_remark');

    // Extention complete Work
    Route::get('/extention-work-listing', [NodalController::class, 'extention_listing'])->name('extention.work.listing');
    Route::get('/extention-work-view/{id}', [NodalController::class, 'extention_work_view'])->name('extention.work.view');
    Route::post('/extention-work-status/{id}', [NodalController::class, 'extention_work_status'])->name('extention.work.status');

     //provisional registration 
     Route::get('/provisional-registration-list', [NodalController::class, 'provisionalRegList'])->name('provisional-registration-list');
     Route::get('/provisional-registration-view/{id}', [NodalController::class, 'provisionalRegView'])->name('provisional-registration-view');
     Route::post('/provisional-registration-submit/{id}', [NodalController::class, 'provisionRegSubmit'])->name('provisional-registration-submit');
     Route::get('/provisional-dsc-letter/{id}', [NodalController::class, 'provisionalDscLetter'])->name('provisional-dsc-letter');

    Route::group(['prefix' => 'professors'], function () {
        Route::get('', [ProfessorsController::class, 'index'])->name('professor.list');
        Route::post('store', [ProfessorsController::class, 'store'])->name('professor.store');
        Route::post('show', [ProfessorsController::class, 'show'])->name('professor.show');
        Route::post('update', [ProfessorsController::class, 'update'])->name('professor.update');
        Route::post('destroy', [ProfessorsController::class, 'destroy'])->name('professor.destroy');
        Route::post('show-by-department', [ProfessorsController::class, 'getProfessorsRespectToDept'])->name('professor.respect.to.department');
    });
});
//dsc expert routes
Route::group(['prefix' => 'dsc'], function () {
    Route::view('/dashboard', 'professors.dashboard')->name('professors.dashboard');
    Route::get('/coursework-list', [ProfessorsController::class, 'courseworkList'])->name('dsc.coursework-list');
    Route::get('/coursework-details/{id}', [ProfessorsController::class, 'courseworkDetails'])->name('dsc.coursework-details');
    Route::post('/update-coursework', [ProfessorsController::class, 'updateCourseworkRemarks'])->name('dsc.update-coursework-remarks');
    //Semester Progress Report
    Route::get('/student-semester-list', [ProfessorsController::class, 'sup_semester_list'])->name('dsc.semester.list');
    Route::get('/student-semester-view/{id}', [ProfessorsController::class, 'sup_semester_view'])->name('dsc.semester.view');

    //provisional registration
    Route::get('/provisional-registration-list', [ProfessorsController::class, 'provisionalRegList'])->name('dsc.provisional-registration-list');
    Route::get('/provisional-registration-view/{id}', [ProfessorsController::class, 'provisionalRegView'])->name('dsc.provisional-registration-view');

});

Route::group(['prefix' => 'control-cell', 'middleware' => 'role:control_cell', 'as' => 'control-cell.'], function () {
    Route::get('/applied-application', [ControlcellApplicationController::class, 'appliedApplication'])->name('applied-application');
    Route::get('/verify-application/{id}', [ControlcellApplicationController::class, 'viewApplication'])->name('verify-application');
    Route::post('/edit-application/{id}', [ControlcellApplicationController::class, 'editApplication'])->name('edit-application');
    Route::get('/preview-application/{id}/{type}', [ControlcellApplicationController::class, 'previewApplication'])->name('preview-application');
    Route::post('/update-remarks', [ControlcellApplicationController::class, 'update_transfer_to_je_remarks'])->name('update.transfer.to.remarks');
    Route::get('/email-phd-form/{id?}', [PHDStudentController::class, 'notify_student_view'])->name('notify.view');

    Route::post('/approve-application/{id}', [ControlcellApplicationController::class, 'approveApplication'])->name('approve-application');
    Route::get('/all-application', [ControlcellApplicationController::class, 'allApplication'])->name('all-application');
    Route::get('/single-application/{id}', [ControlcellApplicationController::class, 'singleApplication'])->name('single-application');

    //coursework code
    Route::get('/view-coursework/{id}', [ControlcellApplicationController::class, 'viewCoursework'])->name('view-coursework');
    Route::post('/view-coursework-update', [ControlcellApplicationController::class, 'viewCourseworkUpdate'])->name('view-coursework-update');
    Route::post('/coursework-transfer', [ControlcellApplicationController::class, 'courseworkTransfer'])->name('coursework-transfer');

    //semester register
    Route::get('/semester-register', [ControlcellApplicationController::class, 'semesterRegister'])->name('semester-register');
    Route::get('/semester-register-view/{id}', [ControlcellApplicationController::class, 'semesterRegisterView'])->name('semester-register-view');
    Route::post('/semester-register-store/{id}', [ControlcellApplicationController::class, 'semesterRegisterStore'])->name('semester-register-store');
    Route::get('semester/payment/{id}', [ControlcellApplicationController::class, 'semesterPayment'])->name('semester-payment.payment');

    // ====== For supervisor =======
    Route::get('/supervisor/applied-application', [ControlcellApplicationController::class, 'supervisor_appliedApplication'])->name('supervisor.applied-application');
    Route::get('/verify-application/{id}', [ControlcellApplicationController::class, 'viewApplication'])->name('verify-application');
    // Route::get('/supervisor/preview-application', [ControlcellApplicationController::class, 'SupPreviewApplication'])->name('sup.preview-application');
    Route::get('/supervisor/preview-application/{id}', [ControlcellApplicationController::class, 'SupPreviewApplication'])->name('sup.preview-application');
    Route::post('/supervisor/control-remark-store/{id}', [ControlcellApplicationController::class, 'control_remark_store'])->name('sup.control.remark.store');
    Route::get('/supervisor/control-remark-draft/{id}', [ControlcellApplicationController::class, 'control_remark_draft'])->name('sup.control.remark.draft');
    Route::post('/supervisor/control-remark-submit/{id}', [ControlcellApplicationController::class, 'control_remark_submit'])->name('sup.control.remark.submit');
    Route::get('/supervisor/all-application', [ControlcellApplicationController::class, 'SupallApplication'])->name('sup-all-application');

    // ====== For Co-supervisor =======
    Route::get('/cosupervisor/applied-application', [ControlcellApplicationController::class, 'cosupervisor_appliedApplication'])->name('cosupervisor.applied-application');
    Route::get('/cosupervisor/verify-application/{id}', [ControlcellApplicationController::class, 'cosup_viewApplication'])->name('coverify-application');
    Route::get('/cosupervisor/preview-application/{id}', [ControlcellApplicationController::class, 'coSupPreviewApplication'])->name('cosup.preview-application');
    Route::post('/cosupervisor/control-remark-store/{id}', [ControlcellApplicationController::class, 'cocontrol_remark_store'])->name('cosup.control.remark.store');
    Route::get('/cosupervisor/control-remark-draft/{id}', [ControlcellApplicationController::class, 'cosup_control_remark_draft'])->name('cosup.control.remark.draft');
    Route::post('/cosupervisor/control-remark-submit/{id}', [ControlcellApplicationController::class, 'cosup_control_remark_submit'])->name('cosup.control.remark.submit');
    Route::get('/cosupervisor/all-application', [ControlcellApplicationController::class, 'CoSupallApplication'])->name('cosup-all-application');

    Route::get('/departments', [ConrtrollCellController::class, 'departments'])->name('departments');

    // subash route for form
    Route::get('/proposed-dsc-domain-expert', [ControlcellApplicationController::class, 'dscDomainExpert'])->name('proposed-dsc-domain-expert');
    Route::post('/proposed-domain-expert-submit', [ControlcellApplicationController::class, 'proposedDomainExpertSubmit'])->name('proposed-domain-expert-submit');

    //renewal registration routes
    Route::get('/renewal-request', [ControlcellApplicationController::class, 'renewalRequest'])->name('renewal-request');
    Route::get('/renewal-registration/{id}', [ControlcellApplicationController::class, 'renewalRegistration'])->name('view-renewal-registration');
    // Route::get('/renewal-registration', [ControlcellApplicationController::class, 'renewalRegistration'])->name('view-renewal-registration');
    Route::post('/renewal-registration-store/{id}', [ControlcellApplicationController::class, 'renewalRegistrationStore'])->name('renewal-registration-store');
    // end of renewal
    Route::get('/defence-viva-voice', [ControlcellApplicationController::class, 'defenceVivaVoice'])->name('defence_viva_voice');
    Route::get('/provisional-reg-phd', [ControlcellApplicationController::class, 'provisionalRegPhd'])->name('provisional_reg_phd');
    Route::get('/dsc-formation', [ControlcellApplicationController::class, 'dscFormation'])->name('dsc_formation');

    // semester view
    Route::get('/semister-listing', [ControlcellApplicationController::class, 'control_semester_list'])->name('semester.list');
    Route::get('/semister-view/{id}', [ControlcellApplicationController::class, 'control_semester_view'])->name('semester.view');
    Route::post('/semister-status/{id}', [ControlcellApplicationController::class, 'control_semester_status'])->name('semester.status');

    // === semester progresss

    Route::get('/student-semester-list', [ControlcellApplicationController::class, 'sup_semester_list'])->name('control.semester.list');
    Route::get('/student-semester-view/{id}', [ControlcellApplicationController::class, 'sup_semester_view'])->name('control.semester.view');
    Route::post('/student-semester-store/{id}', [ControlcellApplicationController::class, 'sup_semester_store'])->name('control.semester.store');
    //discontinuation as Ph.D
    Route::get('/discontinue-request', [ControlcellApplicationController::class, 'discontinueRequest'])->name('discontinue-request');
    Route::get('/discontinue-registration/{id}', [ControlcellApplicationController::class, 'discontinueRegistration'])->name('view-discontinue-registration');
    Route::post('/discontinue-registration-store/{id}', [ControlcellApplicationController::class, 'discontinueRegistrationStore'])->name('discontinue-registration-store');

    //change nodal center code
    Route::get('/change-nodal-request', [ControlcellApplicationController::class, 'changeNodalCenter'])->name('change-nodal-request');
    Route::get('/change-nodal-view/{id}', [ControlcellApplicationController::class, 'changeNodalView'])->name('change-nidal-view');
    Route::post('/change-nodal-remark/{id}', [ControlcellApplicationController::class, 'changeNodalRemark'])->name('change-nodal-remark');

    // student Leave =====

    Route::get('/special-leave-listing', [ControlcellApplicationController::class, 'special_leave_listing'])->name('leave.list');
    Route::get('/special-leave-view/{id}', [ControlcellApplicationController::class, 'special_leave_view'])->name('leave.view');
    Route::post('/special-leave-status/{id}', [ControlcellApplicationController::class, 'special_leave_status'])->name('leave.status');

    // Extention complete Work
    //change reserach supervisor
    Route::get('/change_supervisor', [ControlcellApplicationController::class, 'change_supervisor_request'])->name('change_supervisor');
    Route::get('/view_change_supervisor/{id}', [ControlcellApplicationController::class, 'view_change_supervisor'])->name('view_change_supervisor');
    Route::post('/change_supervisor_remark/{id}', [ControlcellApplicationController::class, 'change_supervisor_remark'])->name('change_supervisor_remark');
    // Extention complete Work
    Route::get('/extention-work-listing', [ControlcellApplicationController::class, 'extention_listing'])->name('extention.work.listing');
    Route::get('/extention-work-view/{id}', [ControlcellApplicationController::class, 'extention_work_view'])->name('extention.work.view');
    Route::post('/extention-work-status/{id}', [ControlcellApplicationController::class, 'extention_work_status'])->name('extention.work.status');

    //provisional registration 
    Route::get('/provisional-registration-list', [ControlcellApplicationController::class, 'provisionalRegList'])->name('provisional-registration-list');
    Route::get('/provisional-registration-view/{id}', [ControlcellApplicationController::class, 'provisionalRegView'])->name('provisional-registration-view');
    Route::post('/provisional-registration-submit/{id}', [ControlcellApplicationController::class, 'provisionRegSubmit'])->name('provisional-registration-submit');
    Route::post('/provisional-registration-transfer/{id}', [ControlcellApplicationController::class, 'provisionRegTransfer'])->name('provisional-registration-transfer');
});

Route::group(['prefix' => 'vice-chancellor', 'middleware' => 'role:vice-chancellor', 'as' => 'vc.'], function () {
    Route::get('/applied-application', [VcController::class, 'appliedApplication'])->name('applied-application');
    Route::get('/verify-application/{id}', [VcController::class, 'viewApplication'])->name('verify-application');
    Route::post('/edit-application/{id}', [VcController::class, 'editApplication'])->name('edit-application');
    Route::get('/preview-application/{id}', [VcController::class, 'previewApplication'])->name('preview-application');
    Route::post('/approve-application/{id}', [VcController::class, 'approveApplication'])->name('approve-application');
    Route::get('/all-application', [VcController::class, 'allApplication'])->name('all-application');
    Route::get('/single-application/{id}', [VcController::class, 'singleApplication'])->name('single-application');
    Route::get('/email-phd-form/{id?}', [PHDStudentController::class, 'notify_student_view'])->name('notify.view');

     //coursework code
     Route::get('/view-coursework/{id}', [VcController::class, 'viewCoursework'])->name('view-coursework');
     Route::post('/view-coursework-update', [VcController::class, 'viewCourseworkUpdate'])->name('view-coursework-update');

    // ====== For supervisor =======
    Route::get('/vc/applied-application', [VcController::class, 'vc_appliedApplication'])->name('vc.applied-application');
    Route::get('/verify-application/{id}', [VcController::class, 'viewApplication'])->name('verify-application');
    Route::get('/vc/preview-application/{id}', [VcController::class, 'VcPreviewApplication'])->name('vc.preview-application');
    Route::post('/vc/vc-remark-store/{id}', [VcController::class, 'vc_remark_store'])->name('sup.vc.remark.store');
    Route::get('/vc/vc-remark-draft/{id}', [VcController::class, 'vc_remark_draft'])->name('sup.vc.remark.draft');
    Route::post('/vc/vc-remark-submit/{id}', [VcController::class, 'vc_remark_submit'])->name('sup.vc.remark.submit');
    Route::get('/vc/all-application', [VcController::class, 'VcallApplication'])->name('vc-all-application');

    // ====== For co-supervisor =======
    Route::get('/vc/co-supervisor/applied-application', [VcController::class, 'vc_coappliedApplication'])->name('vc.coapplied-application');
    Route::get('/verify-application/{id}', [VcController::class, 'viewApplication'])->name('verify-application');
    Route::get('/vc/co-supervisor/preview-application/{id}', [VcController::class, 'Vc_CoPreviewApplication'])->name('vc.copreview-application');
    Route::post('/vc/co-supervisor/vc-remark-store/{id}', [VcController::class, 'vc_coremark_store'])->name('cosup.vc.remark.store');
    //  Route::get('/vc/co-supervisor/vc-remark-draft/{id}', [VcController::class, 'vc_coremark_draft'])->name('cosup.vc.remark.draft');
    //  Route::post('/vc/co-supervisor/vc-remark-submit/{id}', [VcController::class, 'vc_coremark_submit'])->name('cosup.vc.remark.submit');
    Route::get('/vc/co-supervisor/all-application', [VcController::class, 'VccoallApplication'])->name('co-all-application');

    //subash work
    Route::get('/preview-application/{id}/{type}', [VcController::class, 'previewApplication'])->name('preview-application');
    Route::post('/approve-application/{id}/{type}', [VcController::class, 'approveApplication'])->name('approve-application');

    //renewal registration routes
    Route::get('/renewal-request', [VcController::class, 'renewalRequest'])->name('renewal-request');
    Route::get('/renewal-registration/{id}', [VcController::class, 'renewalRegistration'])->name('view-renewal-registration');
    // Route::get('/renewal-registration', [VcController::class, 'renewalRegistration'])->name('view-renewal-registration');
    Route::post('/renewal-registration-store/{id}', [VcController::class, 'renewalRegistrationStore'])->name('renewal-registration-store');

    //discontinuation as Ph.d
    Route::get('/discontinue-request', [VcController::class, 'discontinueRequest'])->name('discontinue-request');
    Route::get('/discontinue-registration/{id}', [VcController::class, 'discontinueRegistration'])->name('view-discontinue-registration');
    Route::post('/discontinue-registration-store/{id}', [VcController::class, 'discontinueRegistrationStore'])->name('discontinue-registration-store');

    //Domain Expert
    Route::get('/domain-request', [VcController::class, 'domainRequest'])->name('domain-request');
    Route::get('/domain-remark/{id}', [VcController::class, 'domainRemark'])->name('view-domain-remark');
    Route::post('/domain-remark-store/{id}', [VcController::class, 'domainRemarkStore'])->name('domain-remark-store');
    Route::post('/domain-expert-store/{id}', [VcController::class, 'domainExpertStore'])->name('domain-expert-store');

    //change nodal center
    Route::get('/change-nodal-request', [VcController::class, 'changeNodalCenter'])->name('change-nodal-request');
    Route::get('/change-nodal-view/{id}', [VcController::class, 'changeNodalView'])->name('change-nidal-view');
    Route::post('/change-nodal-remark/{id}', [VcController::class, 'changeNodalRemark'])->name('change-nodal-remark');

    // student Leave =====

    Route::get('/special-leave-listing', [VcController::class, 'special_leave_listing'])->name('leave.list');
    Route::get('/special-leave-view/{id}', [VcController::class, 'special_leave_view'])->name('leave.view');
    Route::post('/special-leave-status/{id}', [VcController::class, 'special_leave_status'])->name('leave.status');

    //change reserach supervisor
    Route::get('/change_supervisor', [VcController::class, 'change_supervisor_request'])->name('change_supervisor');
    Route::get('/view_change_supervisor/{id}', [VcController::class, 'view_change_supervisor'])->name('view_change_supervisor');
    Route::post('/change_supervisor_remark/{id}', [VcController::class, 'change_supervisor_remark'])->name('change_supervisor_remark');

    //provisional registration
    Route::get('/provisional-registration-list', [VcController::class, 'provisionalRegList'])->name('provisional-registration-list');
    Route::get('/provisional-registration-view/{id}', [VcController::class, 'provisionalRegView'])->name('provisional-registration-view');
    Route::post('/provisional-registration-submit/{id}', [VcController::class, 'provisionRegSubmit'])->name('provisional-registration-submit');
});
Route::post('/view-invoice', [NodalController::class, 'applicationInvoice'])->name('view-invoice');

Route::group(['prefix' => 'supervisor', 'middleware' => 'role:supervisor'], function () {
    Route::view('/dashboard', 'admin.dashboard')->name('supervisor.dashboard');
    Route::get('admin/phdStudents', [PHDStudentController::class, 'admin_index'])->name('phdStudents.admin.index');
    Route::get('admin/view-students/{id}', [PHDStudentController::class, 'view_student'])->name('view_student');
    Route::get('admin/view-concent/{id}', [PHDStudentController::class, 'view_concent'])->name('view.concent');
    Route::post('admin/add_remarks/{id}', [PHDStudentController::class, 'add_remarks'])->name('add_remarks');

    Route::post('/store', [SupervisorController::class, 'store'])->name('supervisors.store');
    Route::post('/store-info-draft/{id}', [SupervisorController::class, 'store_info_draft'])->name('supervisors.store.draft');
    Route::get('/info-draft-view/{id}', [SupervisorController::class, 'info_draft_view'])->name('store.draft.view');
    Route::get('/supervisor-education-view/{id}', [SupervisorController::class, 'sup_education_view'])->name('sup.education.view');
    Route::post('/store-education/{id}', [SupervisorController::class, 'store_education'])->name('sup.store.edu');
    Route::get('/draft-education-view/{id}', [SupervisorController::class, 'draft_education_view'])->name('draft.education.view');
    Route::post('/draft-store-education/{id}', [SupervisorController::class, 'draft_store_education'])->name('draft.store.education');
    Route::get('/supervisor-journal/{id}', [SupervisorController::class, 'sup_journal_view'])->name('sup.journal.view');
    Route::post('/supervisor-journal-store/{id}', [SupervisorController::class, 'sup_journal_store'])->name('sup.journal.store');
    Route::get('/journal-draft-view/{id}', [SupervisorController::class, 'journal_draft_view'])->name('journal.draft.view');
    Route::post('/journal-draft-store/{id}', [SupervisorController::class, 'journal_draft_store'])->name('journal.draft.store');
    Route::POST('/upload/experi-cetrificate', [SupervisorController::class, 'supervisor_upload_certi'])->name('supervisors.exp.certi');
    Route::POST('/upload/journal-publish', [SupervisorController::class, 'supervisor_upload_journal'])->name('supervisors.journal');

    Route::get('/apply', [SupervisorController::class, 'sup_apply'])->name('sup_apply');
    Route::get('/apply-form-view/{id}', [SupervisorController::class, 'sup_apply_view'])->name('apply-form-view');
    Route::get('/draft-form/{id}', [SupervisorController::class, 'sup_draft_data'])->name('sup.draft');
    Route::post('/draft-form-store/{id}', [SupervisorController::class, 'sup_draft_store'])->name('sup.draft.store');
    Route::post('/delete-qual-certi', [SupervisorController::class, 'sup_delete_quali_certi'])->name('sup.delete_quali_certi');
    Route::post('/delete-employment', [SupervisorController::class, 'sup_delete_employment'])->name('sup.delete_employment');
    Route::post('/delete-publication', [SupervisorController::class, 'sup_delete_publication'])->name('sup.delete_publication');
    Route::post('/delete-publication-detail', [SupervisorController::class, 'sup_del_pub_detail'])->name('sup.delete_pub_detail');
    Route::post('/delete-other-test', [SupervisorController::class, 'sup_other_test_del'])->name('sup.other_test_del');
    Route::post('/qualification/certificate', [SupervisorController::class, 'quali_certi'])->name('sup.quali.certi');
    Route::get('/preview/{id}', [SupervisorController::class, 'sup_preview'])->name('sup.preview');
    Route::post('/preview/submit', [SupervisorController::class, 'sup_preview_submit'])->name('sup.preview.submit');

    //subash route for form
    //domain expert
    Route::get('/domain-expert', [SupervisorController::class, 'fetchDomainExpert'])->name('domain-expert');
    Route::post('domain-expert-submit', [SupervisorController::class, 'addDomainExpert'])->name('domain-expert-submit');
    Route::get('/domain-expert-request', [SupervisorController::class, 'requestDomainExpert'])->name('domain-expert-request');
    Route::get('/domain-expert-view/{id}', [SupervisorController::class, 'viewDomainExpert'])->name('domain-expert-view');
    Route::get('/fetch-enroll', [SupervisorController::class, 'fetchEnroll'])->name('fetch-enroll');
    // Route::get('/domain-expert-list', [SupervisorController::class, 'domainExpertList'])->name('domain-expert-list');
    // Route::get('/view-domain-expert/{id}', [SupervisorController::class, 'viewDomainExpert'])->name('view-domain-expert');
    // Route::post('/domain-expert-view-submit', [SupervisorController::class, 'supervisorApprovedDomainExpert'])->name('domain-expert-view-submit');
    // Route::get('/vc-approved-domains/{id}', [SupervisorController::class, 'vcApprovedDomainExperts'])->name('vc-approved-domains/{id}');
    // Route::post('vc-approved-domain-submit', [SupervisorController::class, 'vcApprovedDomain'])->name('vc-approved-domain-submit');

    Route::get('/applied-students-approval', [SupervisorController::class, 'AppliedForStudentApproval'])->name('applied-students-approval');
    Route::get('/preview/{id}/{type}', [SupervisorController::class, 'previewApplication'])->name('preview');
    Route::post('/approve-preview-application/{id}', [SupervisorController::class, 'approveApplication'])->name('supervisor.approve-preview-application');
    Route::post('/approve-new-phd-application/{id}', [SupervisorController::class, 'approveAppliedPhdApplication'])->name('supervisor.approve-new-phd-application');
    // end here

    //renewal registration routes
    Route::get('/renewal-request', [SupervisorController::class, 'renewalRequest'])->name('renewal-request');
    Route::get('/renewal-registration/{id}', [SupervisorController::class, 'renewalRegistration'])->name('view-renewal-registration');
    // Route::get('/renewal-registration', [SupervisorController::class, 'renewalRegistration'])->name('view-renewal-registration');
    Route::post('/renewal-registration-store/{id}', [SupervisorController::class, 'renewalRegistrationStore'])->name('renewal-registration-store');

    //Semester Registration
    Route::get('/semester-registration', [SupervisorController::class, 'semesterRegistration'])->name('sup.semester-registration');
    Route::get('/semester-registration-view/{id}', [SupervisorController::class, 'semesterRegistrationView'])->name('sup.semester-registration-view');
    Route::post('/semester-register-submit/{id}', [SupervisorController::class, 'semesterRegistrationStore'])->name('sup.semester-register-submit');
    // === semester
    Route::get('/student-semester-list', [SupervisorController::class, 'sup_semester_list'])->name('sup.semester.list');
    Route::get('/student-semester-view/{id}', [SupervisorController::class, 'sup_semester_view'])->name('sup.semester.view');
    Route::post('/student-semester-store/{id}', [SupervisorController::class, 'sup_semester_store'])->name('sup.semester.store');
    Route::get('/student-dsc-print/{id}', [SupervisorController::class, 'sup_dsc_print'])->name('sup.dsc.print');

    //discontinuation as ph.d code
    Route::get('/discontinue-request', [SupervisorController::class, 'discontinueRequest'])->name('discontinue-request');
    Route::get('/discontinue-registration/{id}', [SupervisorController::class, 'discontinueRegistration'])->name('view-discontinue-registration');
    Route::post('/discontinue-registration-store/{id}', [SupervisorController::class, 'discontinueRegistrationStore'])->name('discontinue-registration-store');

    // student Leave =====

    Route::get('/special-leave-listing', [SupervisorController::class, 'special_leave_listing'])->name('sup.leave.list');
    Route::get('/special-leave-view/{id}', [SupervisorController::class, 'special_leave_view'])->name('sup.leave.view');
    Route::post('/special-leave-status/{id}', [SupervisorController::class, 'special_leave_status'])->name('sup.leave.status');

    // Extention complete Work
    Route::get('/extention-work-listing', [SupervisorController::class, 'extention_listing'])->name('extention.work.listing');
    Route::get('/extention-work-view/{id}', [SupervisorController::class, 'extention_work_view'])->name('extention.work.view');
    Route::post('/extention-work-status/{id}', [SupervisorController::class, 'extention_work_status'])->name('extention.work.status');

    Route::get('/get_supervisor_details', [SupervisorController::class, 'get_supervisor_details'])->name('get.supervisor.details');
    Route::get('/get_phd_application_applied_details/{id}', [SupervisorController::class, 'previewAppliedPhdApplication'])->name('get.student.phd.application.details');
    Route::post('/submit-dsc-expert', [SupervisorController::class, 'submitDscExperts'])->name('submit.dsc.expert');
    Route::post('/submit-dsc-recommendation', [SupervisorController::class, 'submitRecommendation'])->name('submit.dsc.recommendation');

    //PHD coursework at supervisor
    Route::get('/applied-coursework', [SupervisorController::class, 'AppliedCoursework'])->name('applied-coursework');
    Route::get('/applied-coursework-details/{id?}', [SupervisorController::class, 'AppliedCourseworkDetails'])->name('applied-coursework-details');
    Route::post('/applied-coursework-details/{id?}', [SupervisorController::class, 'AppliedCourseworkDetailsUpdate'])->name('applied-coursework-details-save');
    Route::post('/applied-coursework-details-update', [SupervisorController::class, 'AppliedCourseworkViewUpdate'])->name('applied-coursework-details-update');
    
    Route::post('/show-by-department', [SupervisorController::class, 'getProfessorsRespectToDept'])->name('supervisor.respect.to.department');

    //provisional registration
    Route::get('/provisional-registration-list', [SupervisorController::class, 'provisionalRegList'])->name('provisional-registration-list');
    Route::get('/provisional-registration-view/{id}', [SupervisorController::class, 'provisionalRegView'])->name('provisional-registration-view');
    Route::post('/provisional-registration-submit/{id}', [SupervisorController::class, 'provisionRegSubmit'])->name('provisional-registration-submit');
});

Route::group(['prefix' => 'cosupervisor', 'middleware' => 'role:co-supervisor'], function () {
    Route::view('/dashboard', 'admin.dashboard')->name('cosupervisor.dashboard');
    Route::get('/apply', [CoSupervisor::class, 'cosup_apply'])->name('cosup_apply');
    Route::post('/store', [CoSupervisor::class, 'store'])->name('cosupervisors.store');
    Route::post('/store-info-draft/{id}', [CoSupervisor::class, 'store_info_draft'])->name('cosupervisors.store.draft');

    Route::get('/cosupervisor-education-view/{id}', [CoSupervisor::class, 'sup_education_view'])->name('cosup.education.view');
    Route::post('/store-education/{id}', [CoSupervisor::class, 'store_education'])->name('cosup.store.edu');
    Route::get('/draft-education-view/{id}', [CoSupervisor::class, 'draft_education_view'])->name('codraft.education.view');
    Route::post('/draft-store-education/{id}', [CoSupervisor::class, 'draft_store_education'])->name('codraft.store.education');
    Route::get('/info-draft-view/{id}', [CoSupervisor::class, 'info_draft_view'])->name('costore.draft.view');

    Route::get('/cosupervisor-journal/{id}', [CoSupervisor::class, 'sup_journal_view'])->name('cosup.journal.view');
    Route::post('/cosupervisor-journal-store/{id}', [CoSupervisor::class, 'sup_journal_store'])->name('cosup.journal.store');
    Route::get('/journal-draft-view/{id}', [CoSupervisor::class, 'journal_draft_view'])->name('cojournal.draft.view');
    Route::post('/journal-draft-store/{id}', [CoSupervisor::class, 'journal_draft_store'])->name('cojournal.draft.store');

    // certificate
    Route::post('/delete-employment', [CoSupervisor::class, 'sup_delete_employment'])->name('cosup.delete_employment');
    Route::post('/delete-publication', [CoSupervisor::class, 'sup_delete_publication'])->name('cosup.delete_publication');
    Route::post('/delete-publication-detail', [CoSupervisor::class, 'sup_del_pub_detail'])->name('cosup.delete_pub_detail');
    Route::post('/delete-other-test', [CoSupervisor::class, 'sup_other_test_del'])->name('cosup.other_test_del');

    Route::get('/preview/{id}', [CoSupervisor::class, 'sup_preview'])->name('cosup.preview');
    Route::post('/preview/submit', [CoSupervisor::class, 'sup_preview_submit'])->name('cosup.preview.submit');

    //coursework apllication route
    Route::get('/coursework-application', [CoSupervisor::class, 'courseworkApplication'])->name('cosup.coursework-application');
    Route::get('/coursework-application-view/{id}', [CoSupervisor::class, 'courseworkApplicationView'])->name('cosup.coursework-application-view');
    Route::post('/coursework-application-view', [CoSupervisor::class, 'courseworkApplicationUpdate'])->name('cosup.coursework-application-update');

     //Semester Progress Report
     Route::get('/student-semester-list', [CoSupervisor::class, 'sup_semester_list'])->name('cosup.semester.list');
     Route::get('/student-semester-view/{id}', [CoSupervisor::class, 'sup_semester_view'])->name('cosup.semester.view');

    //provisional registration 
    Route::get('/provisional-registration-list', [CoSupervisor::class, 'provisionalRegList'])->name('cosup.provisional-registration-list');
    Route::get('/provisional-registration-view/{id}', [CoSupervisor::class, 'provisionalRegView'])->name('cosup.provisional-registration-view');
    Route::post('/provisional-registration-submit/{id}', [CoSupervisor::class, 'provisionRegSubmit'])->name('cosup.provisional-registration-submit');
});

// =========== Exam cell routes =============
Route::group(['prefix' => 'exam-cell', 'middleware' => 'role:Exam Cell'], function () {
    Route::view('/dashboard', 'admin.examcell.dashboard')->name('examcell.dashboard');
    Route::get('entrance-test', [ExamCellController::class, 'test_list_index'])->name('entrance_index');
    Route::get('entrance-test-view/{id}', [ExamCellController::class, 'entrance_test_view'])->name('entrance_test_view');
    Route::get('/phd-official-document-view', [AdminController::class, 'official_document_view'])->name('official_document_view');

    //coursework code
    Route::get('/applied-coursework', [ExamCellController::class, 'appliedCoursework'])->name('exam-cell.applied-coursework');
    Route::get('/coursework-application-view/{id}', [ExamCellController::class, 'courseworkApplicationView'])->name('exam-cell.coursework-application-view');

    Route::get('/entrance-application', [ExamCellController::class, 'entranceApplicationList'])->name('stu.entrance-application');
    Route::post('/entrance-application-submit', [ExamCellController::class, 'entranceApplicationSubmit'])->name('stu.entrance-application-submit');

    Route::get('/entrance-application-view/{id}', [ExamCellController::class, 'entranceApplicationView'])->name('stu.entrance-application-view');
    Route::post('/entrance-application-remark/{id}', [ExamCellController::class, 'entranceApplicationRemark'])->name('stu.entrance-application-remark');
    //phd entrance exam date
    Route::get('/entrance-exam-date', [ExamCellController::class, 'entranceExamDate'])->name('stu.entrance-exam-date');
    Route::post('/entrance-exam-date-submit', [ExamCellController::class, 'entranceExamDateSubmit'])->name('stu.entrance-exam-date-submit');
    Route::get('/entrance-exam-date-edit', [ExamCellController::class, 'entranceExamDateEdit'])->name('stu.entrance-exam-date-edit');
    Route::post('/entrance-exam-date-update', [ExamCellController::class, 'entranceExamDateUpdate'])->name('stu.entrance-exam-date-update');
   //phd entrance exam center
   Route::get('/entrance-exam-center', [ExamCellController::class, 'entranceExamCenter'])->name('stu.entrance-exam-center');
    Route::post('/entrance-exam-center-submit', [ExamCellController::class, 'entranceExamCenterSubmit'])->name('stu.entrance-exam-center-submit');
    Route::get('/entrance-exam-center-edit', [ExamCellController::class, 'entranceExamCenterEdit'])->name('stu.entrance-exam-center-edit');
    Route::post('/entrance-exam-center-update', [ExamCellController::class, 'entranceExamCenterUpdate'])->name('stu.entrance-exam-center-update');

    //phd entarance selection
    Route::get('/entrance-exam-selection', [ExamCellController::class, 'entranceExamSelection'])->name('stu.entrance-exam-selection');
    Route::post('/entrance-selection-filter', [ExamCellController::class, 'entranceSelectionFilter'])->name('stu.entrance-selection-filter');
    Route::post('/entrance-exam-selection-submit', [ExamCellController::class, 'entranceExamSelectionSubmit'])->name('stu.entrance-exam-selection-submit');
     //PHD Entrance Attendance Sheet
     Route::get('/entrance-attendance-sheet', [ExamCellController::class, 'entranceAttendanceSheet'])->name('stu.entrance-attendance-sheet');
     Route::get('export-images', [ExamCellController::class, 'exportImages'])->name('export.images');
});

// =================Junior Executive===========
Route::group(['prefix' => 'je', 'middleware' => 'role:Jr. Executive'], function () {
    Route::get('/applied-application', [JuniorExecutiveController::class, 'appliedApplication'])->name('je.applied-application');
    Route::get('/verify-application/{id}', [JuniorExecutiveController::class, 'viewApplication'])->name('je.verify-application');
    Route::post('/phd-application-remark/{id}', [JuniorExecutiveController::class, 'updateApplicationRemark'])->name('je.phd-application-remark');
    Route::get('/email-phd-form/{id?}', [PHDStudentController::class, 'notify_student_view'])->name('je.notify.view');

    //coursework code
    Route::get('/view-coursework/{id}', [JuniorExecutiveController::class, 'viewCoursework'])->name('je.view-coursework');
    Route::post('/view-coursework-update', [JuniorExecutiveController::class, 'viewCourseworkUpdate'])->name('je.view-coursework-update');
    Route::post('/notify-coursework', [JuniorExecutiveController::class, 'notifyCoursework'])->name('notify-coursework');

    //Semester Progress Report
    Route::get('/sem-prog-application', [JuniorExecutiveController::class, 'semProgApplication'])->name('je.sem-prog-application');
    Route::get('/view-semester-progress/{id}', [JuniorExecutiveController::class, 'viewSemesterProg'])->name('je.view-semester-progress');
    Route::post('/student-semester-store/{id}', [JuniorExecutiveController::class, 'sup_semester_store'])->name('je.student-semester-store');
    Route::get('/notify-semester-progress-report/{id}', [JuniorExecutiveController::class, 'notifySemProgress'])->name('notify-semester-progress-report');

    //semester registration 
    Route::get('/semester-register', [JuniorExecutiveController::class, 'semesterRegister'])->name('je.semester-register');
    Route::get('/semester-register-view/{id}', [JuniorExecutiveController::class, 'semesterRegisterView'])->name('je.semester-register-view');
    Route::post('/semester-register-store/{id}', [JuniorExecutiveController::class, 'semesterRegisterStore'])->name('je.semester-register-store');
    Route::get('/notify-semester-register/{id}', [JuniorExecutiveController::class, 'notifySemesterRegister'])->name('je.notify-semester-register');

    //PHD provisional registration 
    Route::get('/provisional-registration-list', [JuniorExecutiveController::class, 'provisionalRegList'])->name('je.provisional-registration-list');
    Route::get('/provisional-registration-view/{id}', [JuniorExecutiveController::class, 'provisionalRegView'])->name('je.provisional-registration-view');
    Route::post('/provisional-registration-submit/{id}', [JuniorExecutiveController::class, 'provisionRegSubmit'])->name('je.provisional-registration-submit');
    Route::get('/notify-provision-register/{id}', [JuniorExecutiveController::class, 'provisionRegNotify'])->name('je.notify-provision-register');

});

//Chairperson Routes
Route::group(['prefix' => 'chairperson'], function () {
    Route::view('/dashboard', 'admin.chairperson.dashboard')->name('chairperson.dashboard');
    Route::get('/coursework-list', [ChairpersonController::class, 'courseworkList'])->name('chairperson.coursework-list');
    Route::get('/coursework-details/{id}', [ChairpersonController::class, 'courseworkDetails'])->name('chairperson.coursework-details');
    Route::post('/coursework-details', [ChairpersonController::class, 'courseworkDetailsUpdate'])->name('chairperson.coursework-details.update');

     //Semester Progress Report
     Route::get('/student-semester-list', [ChairpersonController::class, 'sup_semester_list'])->name('chairperson.semester.list');
     Route::get('/student-semester-view/{id}', [ChairpersonController::class, 'sup_semester_view'])->name('chairperson.semester.view');

     //provisional registration
     Route::get('/provisional-registration-list', [ChairpersonController::class, 'provisionalRegList'])->name('chairperson.provisional-registration-list');
     Route::get('/provisional-registration-view/{id}', [ChairpersonController::class, 'provisionalRegView'])->name('chairperson.provisional-registration-view');
});
Route::group(['prefix' => 'co-chairperson'], function () {
    Route::view('/dashboard', 'admin.cochairperson.dashboard')->name('co-chairperson.dashboard');
    Route::get('/coursework-list', [ChairpersonController::class, 'courseworkListCochairperson'])->name('co-chairperson.coursework-list');
    Route::get('/coursework-details/{id}', [ChairpersonController::class, 'courseDetailsCochairperson'])->name('co-chairperson.coursework-details');
    Route::post('/coursework-details', [ChairpersonController::class, 'courseworkUpdateCochairperson'])->name('co-chairperson.coursework-details.update');
});

Route::group(['prefix' => ''], function () {
    Route::get('/phd-entrance-test', [ExamCellController::class, 'entrance_form'])->name('entrance_form');
    Route::post('/checkemail',[ExamCellController::class, 'checkEmail'])->name('checkemail');
	//Route::get('/entrance-form', [ExamCellController::class, 'entrance_form'])->name('entrance_form');
    Route::get('/entrance-form-2/{id}', [ExamCellController::class, 'entrance_form_two'])->name('entrance_form_two');
    Route::post('/get_branch',[ExamCellController::class, 'get_branch'])->name('get_branch');
    Route::get('/entrance-form-3', [ExamCellController::class, 'entrance_form_three'])->name('entrance_form_three');
    Route::post('exam-cell/apply', [ExamCellController::class, 'phd_entran_apply'])->name('phd_entran_apply');
    Route::get('phd-entrance-test-draft/{id}', [ExamCellController::class, 'phd_entran_draft'])->name('phd_entran_draft');
    Route::post('remove-qualification', [ExamCellController::class, 'remove_qualification'])->name('remove_qualification');
    Route::post('entrance-form-update/{id}', [ExamCellController::class, 'entrance_form_update'])->name('entrance_form_update');
    Route::post('entrance-form-2/apply', [ExamCellController::class, 'phd_entran_two_apply'])->name('phd_entran_two_apply');
    Route::get('entrance-form-2/draft/{id}', [ExamCellController::class, 'phd_entran_two_draft'])->name('phd_entran_two_draft');
    Route::post('entrance-form-2/update/{id}', [ExamCellController::class, 'phd_entran_two_update'])->name('phd_entran_two_update');
    Route::get('entrance-form-preview/{id}', [ExamCellController::class, 'phd_entran_preview'])->name('phd_entran_preview');
    Route::post('entrance-form-preview/{id}', [ExamCellController::class, 'phd_entran_preview_submit'])->name('phd_entran_preview_submit');
    Route::get('entrance-form-final-view/{id}', [ExamCellController::class, 'phd_entran_final'])->name('entrance-form-final-view');
    Route::get('download-admit-card', [ExamCellController::class, 'downloadAdmitCard'])->name('download-admit-card');
    Route::get('download-admit-card-page', [ExamCellController::class, 'downloadAdmitCardPage'])->name('download-admit-card-page');
    Route::get('/phdentrance-admit-card/{id}', [ExamCellController::class, 'entranceAdmitCard'])->name('phdentrance-admit-card');
    Route::get('/generate-zip/{id}', [ExamCellController::class, 'generateZip'])->name('generate.zip');
    //Admit card mail to phd students
    Route::get('/send-admitcard-mail', [ExamCellController::class, 'sendMail'])->name('stu.send-mail-remainder');
    Route::get('/entrance-remainder-mail', [ExamCellController::class, 'entranceRemainder'])->name('stu.entrance-remainder-mail');
    //Route::post('entrance-form-2/update/{id}',[ExamCellController::class,'phd_entran_two_update'])->name('phd_entran_two_update');

    // ============================= End exam cell routes =============
    // Bput Official forms

    //research supervisor forms
    Route::get('/research_supervisor', [AdminController::class, 'research_supervisor'])->name('forms.research_supervisor');
    Route::view('/researchsupervisorform', 'forms.researchsupervisorform')->name('forms.researchsupervisorform');
    Route::view('/fee_structure', 'forms.fee_structure')->name('forms.fee_structure');
    Route::view('/feestructureform', 'forms.feestructureform')->name('forms.feestructureform');
    Route::view('/dsc_domain', 'forms.dsc_domain')->name('forms.dsc_domain');
    Route::view('/dscdomainform', 'forms.dscdomainform')->name('forms.dscdomainform');

    Route::view('/noc_candidate', 'forms.noc_candidate')->name('forms.noc_candidate');
    Route::view('/noc_candidateform', 'forms.noc_candidateform')->name('forms.noc_candidateform');

    Route::view('/part_time', 'forms.part_time')->name('forms.part_time');
    Route::view('/part-timeform', 'forms.part-timeform')->name('forms.part-timeform');
    Route::view('/child_care', 'forms.child_care')->name('forms.child_care');
    Route::view('/child_careform', 'forms.child_careform')->name('forms.child_careform');
    Route::view('/nodal_center', 'forms.nodal_center')->name('forms.nodal_center');
    Route::view('/nodal_centerform', 'forms.nodal_centerform')->name('forms.nodal_centerform');
    Route::view('/bput_entrance', 'forms.bput_entrance')->name('forms.bput_entrance');
    Route::view('/bput_entranceform', 'forms.bput_entranceform')->name('forms.bput_entranceform');

    Route::view('/enrollment', 'forms.enrollment')->name('forms.enrollment');
    Route::view('/enrollmentform', 'forms.enrollmentform')->name('forms.enrollmentform');

    Route::view('/phd_program', 'forms.phd_program')->name('forms.phd_program');
    Route::view('/phd_programform', 'formssupervisorc.phd_programform')->name('forms.phd_programform');

    Route::view('/dsc_research', 'forms.dsc_research')->name('forms.dsc_research');
    Route::view('/dsc_researchform', 'forms.dsc_researchform')->name('forms.dsc_researchform');

    Route::view('/dsc_title', 'forms.dsc_title')->name('forms.dsc_title');
    Route::view('/dsc_titleform', 'forms.dsc_titleform')->name('forms.dsc_titleform');

    Route::view('/phd_semester', 'forms.phd_semester')->name('forms.phd_semester');
    Route::view('/phd_semesterform', 'forms.phd_semesterform')->name('forms.phd_semesterform');
    Route::view('/supervisor', 'forms.supervisor')->name('forms.supervisor');
    Route::view('/supervisorform', 'forms.supervisorform')->name('forms.supervisorform');
    Route::view('/inclusion', 'forms.inclusion')->name('forms.inclusion');
    Route::view('/inclusionform', 'forms.inclusionform')->name('forms.inclusionform');

    Route::view('/allotment', 'forms.allotment')->name('forms.allotment');
    Route::view('/allotmentform', 'forms.allotmentform')->name('forms.allotmentform');

    Route::view('/seekingwork', 'forms.seekingwork')->name('forms.seekingwork');
    Route::view('/seekingworkform', 'forms.seekingworkform')->name('forms.seekingworkform');
    Route::view('/bput_semester', 'forms.bput_semester')->name('forms.bput_semester');
    Route::view('/bput_semesterform', 'forms.bput_semesterform')->name('forms.bput_semesterform');

    Route::view('/discontiue_stud', 'forms.discontiue_stud')->name('forms.discontiue_stud');
    Route::view('/discontiue_studform', 'forms.discontiue_studform')->name('forms.discontiue_studform');
    Route::view('/provisional', 'forms.provisional')->name('forms.provisional');
    Route::view('/provisional-form', 'forms.provisional-form')->name('forms.provisional-form');

    Route::view('/office-order', 'forms.office-order')->name('forms.office-order');
    Route::view('/office-orderform', 'forms.office-orderform')->name('forms.office-orderform');
    Route::view('/regd-renewal', 'forms.regd-renewal')->name('forms.regd-renewal');
    Route::view('/regd-renewalform', 'forms.regd-renewalform')->name('forms.regd-renewalform');

    Route::view('/thesis-submission', 'forms.thesis-submission')->name('forms.thesis-submission');
    Route::view('/thesis-submissionform', 'forms.thesis-submissionform')->name('forms.thesis-submissionform');
    Route::view('/plagiarism-free', 'forms.plagiarism-free')->name('forms.plagiarism-free');
    Route::view('/plagiarism-freeform', 'forms.plagiarism-freeform')->name('forms.plagiarism-freeform');

    Route::view('/declaration-free', 'forms.declaration-free')->name('forms.declaration-free');
    Route::view('/declaration-freeform', 'forms.declaration-freeform')->name('forms.declaration-freeform');
    //acedemy year.......
    Route::view('/academic-page', 'forms.academic-page')->name('forms.academic-page');
    Route::view('/academic-form', 'forms.academic-form')->name('forms.academic-form');
    Route::view('/academic-wef', 'forms.academic-wef')->name('forms.academic-wef');
    Route::view('/academic-wef-page', 'forms.academic-wef-page')->name('forms.academic-wef-page');
    Route::view('/academic-declaration', 'forms.academic-declaration')->name('forms.academic-declaration');
    Route::view('/check-listform', 'forms.check-listform')->name('forms.check-listform');

    Route::view('/thesis-certificate', 'forms.thesis-certificate')->name('forms.thesis-certificate');
    Route::view('/thesis-receipt', 'forms.thesis-receipt')->name('forms.thesis-receipt');
    Route::view('/thesis-submit', 'forms.thesis-submit')->name('forms.thesis-submit');
    Route::view('/adjudication-thesis', 'forms.adjudication-thesis')->name('forms.adjudication-thesis');
    Route::view('/confidential_form', 'forms.confidential_form')->name('forms.confidential_form');
    Route::view('/external-thesis', 'forms.external-thesis')->name('forms.external-thesis');
    Route::view('/viva-voiceform', 'forms.viva-voiceform')->name('forms.viva-voiceform');
    Route::view('/proposal-form', 'forms.proposal-form')->name('forms.proposal-form');
    Route::view('/evaluation-form', 'forms.evaluation-form')->name('forms.evaluation-form');
    Route::view('/report-form', 'forms.report-form')->name('forms.report-form');
    Route::view('/remuneration-form', 'forms.remuneration-form')->name('forms.remuneration-form');
    Route::view('/front-page', 'forms.front-page')->name('forms.front-page');
    Route::view('/certificate-page', 'forms.certificate-page')->name('forms.certificate-page');
    Route::view('/thesiscover-page', 'forms.thesiscover-page')->name('forms.thesiscover-page');
    //APPLICATION FOR ENROLMENT forms
    Route::view('/application-enrollment', 'forms.application-enrollment')->name('forms.application-enrollment');
    Route::view('/application-enrollment-form', 'forms.application-enrollment-form')->name('forms.application-enrollment-form');
    Route::view('/application-enrollment-Consent ', 'forms.application-enrollment-Consent')->name('forms.application-enrollment-Consent ');
});
