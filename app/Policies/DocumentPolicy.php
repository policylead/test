<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\Author;
use App\Models\Bookmark;
use App\Models\DocumentCount;
use App\Models\DocumentsComment;
use App\Models\ReportsCustomDocumentImage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DocumentPolicy
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
        if ($user->can('document-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function view(User $user, Document $document)
    {
        if ($user->can('document-view')) {
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
        if ($user->can('document-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function update(User $user, Document $document)
    {
        if ($user->can('document-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        if ($user->can('document-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function searchAuthors(User $user, Document $document)
    {
        if ($user->can('document-search-authors')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can attach new relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @param  Author $author
     * @return mixed
     */
    public function attachAuthor(User $user, Document $document, Author $author)
    {
        if ($user->can('document-attach-author')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can detach new relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @param  Author $author
     * @return mixed
     */
    public function detachAuthor(User $user, Document $document, Author $author)
    {
        if ($user->can('document-detach-author')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function searchBookmarks(User $user, Document $document)
    {
        if ($user->can('document-search-bookmarks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function searchDocumentCounts(User $user, Document $document)
    {
        if ($user->can('document-search-document-counts')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function searchDocumentsComments(User $user, Document $document)
    {
        if ($user->can('document-search-documents-comments')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function searchReportsCustomDocumentImages(User $user, Document $document)
    {
        if ($user->can('document-search-reports-custom-document-images')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @return mixed
     */
    public function searchPersons(User $user, Document $document)
    {
        if ($user->can('document-search-persons')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can attach new relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @param  Author $author
     * @return mixed
     */
    public function attachPerson(User $user, Document $document, Author $author)
    {
        if ($user->can('document-attach-person')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can detach new relation.
     *
     * @param  User  $user
     * @param  Document $document
     * @param  Author $author
     * @return mixed
     */
    public function detachPerson(User $user, Document $document, Author $author)
    {
        if ($user->can('document-detach-person')) {
            return Response::allow();
        }
    }
}
