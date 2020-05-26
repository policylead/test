<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdatePasswordRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\Interest\InterestCollection;
use App\Http\Resources\Alert\AlertCollection;
use App\Http\Resources\Billing\BillingCollection;
use App\Http\Resources\Bookmark\BookmarkCollection;
use App\Http\Resources\ClientFeed\ClientFeedCollection;
use App\Http\Resources\ContentPartner\ContentPartnerCollection;
use App\Http\Resources\Dashboard\DashboardCollection;
use App\Http\Resources\DashboardsSetting\DashboardsSettingCollection;
use App\Http\Resources\DocumentCount\DocumentCountCollection;
use App\Http\Resources\DocumentsComment\DocumentsCommentCollection;
use App\Http\Resources\EmailClick\EmailClickCollection;
use App\Http\Resources\EventEmailClick\EventEmailClickCollection;
use App\Http\Resources\ReportFile\ReportFileCollection;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\ReportsCustomDocument\ReportsCustomDocumentCollection;
use App\Http\Resources\ReportsCustomProvider\ReportsCustomProviderCollection;
use App\Http\Resources\ReportsMailingList\ReportsMailingListCollection;
use App\Http\Resources\Revision\RevisionCollection;
use App\Http\Resources\SentEventAlert\SentEventAlertCollection;
use App\Http\Resources\Stakeholder\StakeholderCollection;
use App\Http\Resources\UserDocRequest\UserDocRequestCollection;
use App\Http\Resources\UserLimit\UserLimitCollection;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserAttachInterestRequest;
use App\Models\User;
use App\Models\Interest;
use App\Models\Alert;
use App\Models\Billing;
use App\Models\Bookmark;
use App\Models\ClientFeed;
use App\Models\ContentPartner;
use App\Models\Dashboard;
use App\Models\DashboardsSetting;
use App\Models\DocumentCount;
use App\Models\DocumentsComment;
use App\Models\EmailClick;
use App\Models\EventEmailClick;
use App\Models\ReportFile;
use App\Models\Report;
use App\Models\ReportsCustomDocument;
use App\Models\ReportsCustomProvider;
use App\Models\ReportsMailingList;
use App\Models\Revision;
use App\Models\SentEventAlert;
use App\Models\Stakeholder;
use App\Models\UserDocRequest;
use App\Models\UserLimit;

/**
 * @group User
 *
 * Endpoints for User entity
 */
class UserController extends Controller
{

    /**
     * Create a new UserController instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(
            'auth:sanctum',
            [
                'except' =>
                    [
                        'store'
                    ]
            ]
        );
    }

    /**
     * Return currently logged in user
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        $user = auth()->user();
        $user->loadIncludes();

        return response()->resource(new UserResource($user));
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreUserRequest $request
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = \DB::transaction(function () use ($request) {
            $user = $request->fill(new User);
            $user->password = bcrypt($request->password);

            $user->save();

            $user->assignRole('admin');
            $user->assignRole('user');

            return $user;
        });

        return response()->success(__('auth.success_registration'));
    }

    /**
     * Update profile
     * @param  UpdateUserRequest  $request
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request): JsonResponse
    {
        $user = \DB::transaction(function () use ($request) {
            $user = auth()->user();

            $user->update();

            return $user;
        });

        return response()->resource(new UserResource($user));
    }

    /**
     * Update password
     * @return JsonResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): JsonResponse
    {
        $user = auth()->user();
        if (!password_verify($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [__('passwords.invalid')],
            ]);
        }

        $user->update(['password' => $request->new_password]);

        return response()->resource(new UserResource($user));
    }

    /**
     * Search for Interests
     *
     * Interests from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchInterests(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchInterests', $user);

        $interests = $user->interests()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new InterestCollection($interests));
    }
    /**
     * Search for Alerts
     *
     * Alerts from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchAlerts(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchAlerts', $user);

        $alerts = $user->alerts()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new AlertCollection($alerts));
    }
    /**
     * Search for Billings
     *
     * Billings from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchBillings(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchBillings', $user);

        $billings = $user->billings()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BillingCollection($billings));
    }
    /**
     * Search for Bookmarks
     *
     * Bookmarks from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchBookmarks(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchBookmarks', $user);

        $bookmarks = $user->bookmarks()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new BookmarkCollection($bookmarks));
    }
    /**
     * Search for ClientFeeds
     *
     * ClientFeeds from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchClientFeeds(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchClientFeeds', $user);

        $clientFeeds = $user->clientFeeds()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ClientFeedCollection($clientFeeds));
    }
    /**
     * Search for ContentPartners
     *
     * ContentPartners from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchContentPartners(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchContentPartners', $user);

        $contentPartners = $user->contentPartners()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ContentPartnerCollection($contentPartners));
    }
    /**
     * Search for Dashboards
     *
     * Dashboards from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchDashboards(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchDashboards', $user);

        $dashboards = $user->dashboards()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardCollection($dashboards));
    }
    /**
     * Search for DashboardsSettings
     *
     * DashboardsSettings from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchDashboardsSettings(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchDashboardsSettings', $user);

        $dashboardsSettings = $user->dashboardsSettings()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DashboardsSettingCollection($dashboardsSettings));
    }
    /**
     * Search for DocumentCounts
     *
     * DocumentCounts from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchDocumentCounts(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchDocumentCounts', $user);

        $documentCounts = $user->documentCounts()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentCountCollection($documentCounts));
    }
    /**
     * Search for DocumentsComments
     *
     * DocumentsComments from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchDocumentsComments(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchDocumentsComments', $user);

        $documentsComments = $user->documentsComments()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new DocumentsCommentCollection($documentsComments));
    }
    /**
     * Search for EmailClicks
     *
     * EmailClicks from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchEmailClicks(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchEmailClicks', $user);

        $emailClicks = $user->emailClicks()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new EmailClickCollection($emailClicks));
    }
    /**
     * Search for EventEmailClicks
     *
     * EventEmailClicks from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchEventEmailClicks(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchEventEmailClicks', $user);

        $eventEmailClicks = $user->eventEmailClicks()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new EventEmailClickCollection($eventEmailClicks));
    }
    /**
     * Search for ReportFiles
     *
     * ReportFiles from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchReportFiles(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchReportFiles', $user);

        $reportFiles = $user->reportFiles()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportFileCollection($reportFiles));
    }
    /**
     * Search for Reports
     *
     * Reports from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchReports(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchReports', $user);

        $reports = $user->reports()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportCollection($reports));
    }
    /**
     * Search for ReportsCustomDocuments
     *
     * ReportsCustomDocuments from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchReportsCustomDocuments(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchReportsCustomDocuments', $user);

        $reportsCustomDocuments = $user->reportsCustomDocuments()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomDocumentCollection($reportsCustomDocuments));
    }
    /**
     * Search for ReportsCustomProviders
     *
     * ReportsCustomProviders from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchReportsCustomProviders(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchReportsCustomProviders', $user);

        $reportsCustomProviders = $user->reportsCustomProviders()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsCustomProviderCollection($reportsCustomProviders));
    }
    /**
     * Search for ReportsMailingLists
     *
     * ReportsMailingLists from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchReportsMailingLists(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchReportsMailingLists', $user);

        $reportsMailingLists = $user->reportsMailingLists()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new ReportsMailingListCollection($reportsMailingLists));
    }
    /**
     * Search for Revisions
     *
     * Revisions from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchRevisions(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchRevisions', $user);

        $revisions = $user->revisions()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new RevisionCollection($revisions));
    }
    /**
     * Search for SentEventAlerts
     *
     * SentEventAlerts from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchSentEventAlerts(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchSentEventAlerts', $user);

        $sentEventAlerts = $user->sentEventAlerts()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new SentEventAlertCollection($sentEventAlerts));
    }
    /**
     * Search for Stakeholders
     *
     * Stakeholders from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchStakeholders(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchStakeholders', $user);

        $stakeholders = $user->stakeholders()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new StakeholderCollection($stakeholders));
    }
    /**
     * Search for UserDocRequests
     *
     * UserDocRequests from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchUserDocRequests(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchUserDocRequests', $user);

        $userDocRequests = $user->userDocRequests()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UserDocRequestCollection($userDocRequests));
    }
    /**
     * Search for UserLimits
     *
     * UserLimits from existing resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function searchUserLimits(Request $request): JsonResponse
    {
        $user = $request->user();
        $this->authorize('searchUserLimits', $user);

        $userLimits = $user->userLimits()->search()->paginate($request->perPage)
            ->appends(request()->query());

        return response()->resource(new UserLimitCollection($userLimits));
    }
    /**
     * Attach Interest
     *
     * Attach the Interest to existing User.
     *
     * @param  UserAttachInterestRequest  $request
     * @param  Interest  $interest
     * @return JsonResponse
     */
    public function attachInterest(UserAttachInterestRequest $request, Interest $interest): JsonResponse
    {
        $user = $request->user();
        $this->authorize('attachInterest', [$user, $interest]);

        $data = $request->only(array_keys($request->rules()));
        $user->interests()->attach($interest, $data);
        $user->loadIncludes();

        return response()->resource(new UserResource($user))
                ->setStatusCode(201)
                ->message(__('crud.attach', [
                    'item' => __('model.Interest')
                ]));
    }

    /**
     * Detach Interest
     *
     * Detach the specified resource from existing resource.
     *
     * @param  Interest  $interest
     * @return JsonResponse
     */
    public function detachInterest(Interest $interest): JsonResponse
    {
        $user = auth()->user();
        $this->authorize('detachInterest', [$user, $interest]);

        $user->interests()->detach($interest);
        return response()->success(__('crud.detach', ['item' => __('model.Interest')]));
    }
}
