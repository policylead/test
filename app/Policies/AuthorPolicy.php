<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\Document;
use App\Models\Report;
use App\Models\StakeholdersList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->can('author-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function view(User $user, Author $author)
    {
        if ($user->can('author-view')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('author-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function update(User $user, Author $author)
    {
        if ($user->can('author-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function delete(User $user, Author $author)
    {
        if ($user->can('author-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function searchAuthorDocuments(User $user, Author $author)
    {
        if ($user->can('author-search-author-documents')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can attach new relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @param  Document $document
     * @return mixed
     */
    public function attachAuthorDocument(User $user, Author $author, Document $document)
    {
        if ($user->can('author-attach-author-document')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can detach new relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @param  Document $document
     * @return mixed
     */
    public function detachAuthorDocument(User $user, Author $author, Document $document)
    {
        if ($user->can('author-detach-author-document')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function searchReports(User $user, Author $author)
    {
        if ($user->can('author-search-reports')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function searchStakeholdersLists(User $user, Author $author)
    {
        if ($user->can('author-search-stakeholders-lists')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @return mixed
     */
    public function searchPersonDocuments(User $user, Author $author)
    {
        if ($user->can('author-search-person-documents')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can attach new relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @param  Document $document
     * @return mixed
     */
    public function attachPersonDocument(User $user, Author $author, Document $document)
    {
        if ($user->can('author-attach-person-document')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can detach new relation.
     *
     * @param  User  $user
     * @param  Author $author
     * @param  Document $document
     * @return mixed
     */
    public function detachPersonDocument(User $user, Author $author, Document $document)
    {
        if ($user->can('author-detach-person-document')) {
            return Response::allow();
        }
    }
}
