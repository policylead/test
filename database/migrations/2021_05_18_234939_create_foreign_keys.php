<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alerts', function (Blueprint $table) {
            $table->foreign('user_id', 'alerts_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('author_documents', function (Blueprint $table) {
            $table->foreign('document_id', 'author_document_documents_document_id_fk')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');
            $table->foreign('author_id', 'author_document_authors_author_id_fk')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('cascade');
        });
        Schema::table('billings', function (Blueprint $table) {
            $table->foreign('user_id', 'billings_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->foreign('user_id', 'bookmarks_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'bookmarks_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
            $table->foreign('document_id', 'bookmarks_documents_document_id_fk')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');
            $table->foreign('newsdesk_id', 'bookmarks_dashboards_newsdesk_id_fk')
                  ->references('id')
                  ->on('dashboards')
                  ->onDelete('cascade');
        });
        Schema::table('client_feed_report_associations', function (Blueprint $table) {
            $table->foreign('client_feed_id', 'cfra_client_feeds_client_feed_id_fk')
                  ->references('id')
                  ->on('client_feeds')
                  ->onDelete('cascade');
            $table->foreign('report_id', 'cfra_reports_report_id_fk')
                  ->references('id')
                  ->on('reports')
                  ->onDelete('cascade');
        });
        Schema::table('client_feeds', function (Blueprint $table) {
            $table->foreign('user_id', 'client_feeds_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('content_partners', function (Blueprint $table) {
            $table->foreign('user_id', 'content_partner_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'content_partner_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('dashboards', function (Blueprint $table) {
            $table->foreign('user_id', 'dashboards_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'dashboards_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('dashboards_keywords', function (Blueprint $table) {
            $table->foreign('dashboard_id', 'dashboards_keywords_dashboards_dashboard_id_fk')
                  ->references('id')
                  ->on('dashboards')
                  ->onDelete('cascade');
        });
        Schema::table('dashboards_settings', function (Blueprint $table) {
            $table->foreign('user_id', 'dashboards_settings_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('dashboard_id', 'dashboards_settings_dashboards_dashboard_id_fk')
                  ->references('id')
                  ->on('dashboards')
                  ->onDelete('cascade');
        });
        Schema::table('document_counts', function (Blueprint $table) {
            $table->foreign('user_id', 'document_counts_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('document_id', 'document_counts_documents_document_id_fk')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');
        });
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('provider_id', 'documents_providers_provider_id_fk')
                  ->references('id')
                  ->on('providers')
                  ->onDelete('cascade');
        });
        Schema::table('documents_comments', function (Blueprint $table) {
            $table->foreign('user_id', 'documents_comments_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'documents_comments_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
            $table->foreign('document_id', 'documents_comments_documents_document_id_fk')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');
        });
        Schema::table('email_clicks', function (Blueprint $table) {
            $table->foreign('user_id', 'email_clicks_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('event_email_clicks', function (Blueprint $table) {
            $table->foreign('user_id', 'event_email_clicks_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('feeds', function (Blueprint $table) {
            $table->foreign('provider_id', 'feeds_providers_provider_id_fk')
                  ->references('id')
                  ->on('providers')
                  ->onDelete('cascade');
        });
        Schema::table('feeds_manuals', function (Blueprint $table) {
            $table->foreign('feed_id', 'feeds_manual_feeds_feed_id_fk')
                  ->references('id')
                  ->on('feeds')
                  ->onDelete('cascade');
        });
        Schema::table('interest_users', function (Blueprint $table) {
            $table->foreign('user_id', 'interest_users_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('interest_id', 'interest_users_interests_interest_id_fk')
                  ->references('id')
                  ->on('interests')
                  ->onDelete('cascade');
        });
        Schema::table('newsletter_subscriptions', function (Blueprint $table) {
            $table->foreign('report_template_id', 'newsletter_subscriptions_report_templates_report_template_id_fk')
                  ->references('id')
                  ->on('report_templates')
                  ->onDelete('cascade');
            $table->foreign('report_mailing_list_id', 'newsletter_subscriptions_reports_mailing_lists_report_mailing_list_id_fk')
                  ->references('id')
                  ->on('reports_mailing_lists')
                  ->onDelete('cascade');
        });
        Schema::table('person_documents', function (Blueprint $table) {
            $table->foreign('person_id', 'person_document_authors_person_id_fk')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('cascade');
            $table->foreign('document_id', 'person_document_documents_document_id_fk')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');
        });
        Schema::table('report_files', function (Blueprint $table) {
            $table->foreign('user_id', 'report_files_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('user_id', 'reports_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('author_id', 'reports_authors_author_id_fk')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'reports_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
            $table->foreign('report_template_id', 'reports_report_templates_report_template_id_fk')
                  ->references('id')
                  ->on('report_templates')
                  ->onDelete('cascade');
        });
        Schema::table('reports_custom_document_images', function (Blueprint $table) {
            $table->foreign('document_id', 'reports_custom_document_images_documents_document_id_fk')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');
        });
        Schema::table('reports_custom_documents', function (Blueprint $table) {
            $table->foreign('user_id', 'reports_custom_documents_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'reports_custom_documents_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('reports_custom_providers', function (Blueprint $table) {
            $table->foreign('user_id', 'reports_custom_providers_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'reports_custom_providers_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('reports_email_clicks', function (Blueprint $table) {
            $table->foreign('report_id', 'reports_email_clicks_reports_report_id_fk')
                  ->references('id')
                  ->on('reports')
                  ->onDelete('cascade');
        });
        Schema::table('reports_mailing_lists', function (Blueprint $table) {
            $table->foreign('user_id', 'reports_mailing_lists_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'reports_mailing_lists_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('reports_scheduleds', function (Blueprint $table) {
            $table->foreign('report_id', 'reports_scheduled_reports_report_id_fk')
                  ->references('id')
                  ->on('reports')
                  ->onDelete('cascade');
            $table->foreign('list_id', 'reports_scheduled_reports_mailing_lists_list_id_fk')
                  ->references('id')
                  ->on('reports_mailing_lists')
                  ->onDelete('cascade');
        });
        Schema::table('reports_versions', function (Blueprint $table) {
            $table->foreign('report_id', 'reports_versions_reports_report_id_fk')
                  ->references('id')
                  ->on('reports')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'reports_versions_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('revisions', function (Blueprint $table) {
            $table->foreign('user_id', 'revisions_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('rss_subscriptions', function (Blueprint $table) {
            $table->foreign('feed_id', 'rss_subscriptions_feeds_feed_id_fk')
                  ->references('id')
                  ->on('feeds')
                  ->onDelete('cascade');
        });
        Schema::table('sent_email_alerts', function (Blueprint $table) {
            $table->foreign('dashboard_id', 'sent_email_alerts_dashboards_dashboard_id_fk')
                  ->references('id')
                  ->on('dashboards')
                  ->onDelete('cascade');
        });
        Schema::table('sent_event_alerts', function (Blueprint $table) {
            $table->foreign('user_id', 'sent_event_alerts_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('stakeholders', function (Blueprint $table) {
            $table->foreign('user_id', 'stakeholders_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->foreign('team_id', 'stakeholders_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
        Schema::table('stakeholders_keywords', function (Blueprint $table) {
            $table->foreign('list_id', 'stakeholders_keywords_stakeholders_list_id_fk')
                  ->references('id')
                  ->on('stakeholders')
                  ->onDelete('cascade');
        });
        Schema::table('stakeholders_lists', function (Blueprint $table) {
            $table->foreign('parent_id', 'stakeholders_list_stakeholders_parent_id_fk')
                  ->references('id')
                  ->on('stakeholders')
                  ->onDelete('cascade');
            $table->foreign('author_id', 'stakeholders_list_authors_author_id_fk')
                  ->references('id')
                  ->on('authors')
                  ->onDelete('cascade');
            $table->foreign('stakeholders_data_id', 'stakeholders_list_stakeholders_data_stakeholders_data_id_fk')
                  ->references('id')
                  ->on('stakeholders_datas')
                  ->onDelete('cascade');
        });
        Schema::table('tagging_taggeds', function (Blueprint $table) {
            $table->foreign('taggable_id', 'tagging_tagged_sent_email_alerts_taggable_id_fk')
                  ->references('id')
                  ->on('sent_email_alerts')
                  ->onDelete('cascade');
        });
        Schema::table('user_doc_requests', function (Blueprint $table) {
            $table->foreign('user_id', 'user_doc_requests_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('user_limits', function (Blueprint $table) {
            $table->foreign('user_id', 'user_limits_users_user_id_fk')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('team_id', 'users_teams_list_team_id_fk')
                  ->references('id')
                  ->on('teams_lists')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alerts', function (Blueprint $table) {
            $table->dropForeign('alerts_users_user_id_fk');
        });
        Schema::table('author_documents', function (Blueprint $table) {
            $table->dropForeign('author_document_documents_document_id_fk');
            $table->dropForeign('author_document_authors_author_id_fk');
        });
        Schema::table('billings', function (Blueprint $table) {
            $table->dropForeign('billings_users_user_id_fk');
        });
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropForeign('bookmarks_users_user_id_fk');
            $table->dropForeign('bookmarks_teams_list_team_id_fk');
            $table->dropForeign('bookmarks_documents_document_id_fk');
            $table->dropForeign('bookmarks_dashboards_newsdesk_id_fk');
        });
        Schema::table('client_feed_report_associations', function (Blueprint $table) {
            $table->dropForeign('cfra_client_feeds_client_feed_id_fk');
            $table->dropForeign('cfra_reports_report_id_fk');
        });
        Schema::table('client_feeds', function (Blueprint $table) {
            $table->dropForeign('client_feeds_users_user_id_fk');
        });
        Schema::table('content_partners', function (Blueprint $table) {
            $table->dropForeign('content_partner_users_user_id_fk');
            $table->dropForeign('content_partner_teams_list_team_id_fk');
        });
        Schema::table('dashboards', function (Blueprint $table) {
            $table->dropForeign('dashboards_users_user_id_fk');
            $table->dropForeign('dashboards_teams_list_team_id_fk');
        });
        Schema::table('dashboards_keywords', function (Blueprint $table) {
            $table->dropForeign('dashboards_keywords_dashboards_dashboard_id_fk');
        });
        Schema::table('dashboards_settings', function (Blueprint $table) {
            $table->dropForeign('dashboards_settings_users_user_id_fk');
            $table->dropForeign('dashboards_settings_dashboards_dashboard_id_fk');
        });
        Schema::table('document_counts', function (Blueprint $table) {
            $table->dropForeign('document_counts_users_user_id_fk');
            $table->dropForeign('document_counts_documents_document_id_fk');
        });
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('documents_providers_provider_id_fk');
        });
        Schema::table('documents_comments', function (Blueprint $table) {
            $table->dropForeign('documents_comments_users_user_id_fk');
            $table->dropForeign('documents_comments_teams_list_team_id_fk');
            $table->dropForeign('documents_comments_documents_document_id_fk');
        });
        Schema::table('email_clicks', function (Blueprint $table) {
            $table->dropForeign('email_clicks_users_user_id_fk');
        });
        Schema::table('event_email_clicks', function (Blueprint $table) {
            $table->dropForeign('event_email_clicks_users_user_id_fk');
        });
        Schema::table('feeds', function (Blueprint $table) {
            $table->dropForeign('feeds_providers_provider_id_fk');
        });
        Schema::table('feeds_manuals', function (Blueprint $table) {
            $table->dropForeign('feeds_manual_feeds_feed_id_fk');
        });
        Schema::table('interest_users', function (Blueprint $table) {
            $table->dropForeign('interest_users_users_user_id_fk');
            $table->dropForeign('interest_users_interests_interest_id_fk');
        });
        Schema::table('newsletter_subscriptions', function (Blueprint $table) {
            $table->dropForeign('newsletter_subscriptions_report_templates_report_template_id_fk');
            $table->dropForeign('newsletter_subscriptions_reports_mailing_lists_report_mailing_list_id_fk');
        });
        Schema::table('person_documents', function (Blueprint $table) {
            $table->dropForeign('person_document_authors_person_id_fk');
            $table->dropForeign('person_document_documents_document_id_fk');
        });
        Schema::table('report_files', function (Blueprint $table) {
            $table->dropForeign('report_files_users_user_id_fk');
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign('reports_users_user_id_fk');
            $table->dropForeign('reports_authors_author_id_fk');
            $table->dropForeign('reports_teams_list_team_id_fk');
            $table->dropForeign('reports_report_templates_report_template_id_fk');
        });
        Schema::table('reports_custom_document_images', function (Blueprint $table) {
            $table->dropForeign('reports_custom_document_images_documents_document_id_fk');
        });
        Schema::table('reports_custom_documents', function (Blueprint $table) {
            $table->dropForeign('reports_custom_documents_users_user_id_fk');
            $table->dropForeign('reports_custom_documents_teams_list_team_id_fk');
        });
        Schema::table('reports_custom_providers', function (Blueprint $table) {
            $table->dropForeign('reports_custom_providers_users_user_id_fk');
            $table->dropForeign('reports_custom_providers_teams_list_team_id_fk');
        });
        Schema::table('reports_email_clicks', function (Blueprint $table) {
            $table->dropForeign('reports_email_clicks_reports_report_id_fk');
        });
        Schema::table('reports_mailing_lists', function (Blueprint $table) {
            $table->dropForeign('reports_mailing_lists_users_user_id_fk');
            $table->dropForeign('reports_mailing_lists_teams_list_team_id_fk');
        });
        Schema::table('reports_scheduleds', function (Blueprint $table) {
            $table->dropForeign('reports_scheduled_reports_report_id_fk');
            $table->dropForeign('reports_scheduled_reports_mailing_lists_list_id_fk');
        });
        Schema::table('reports_versions', function (Blueprint $table) {
            $table->dropForeign('reports_versions_reports_report_id_fk');
            $table->dropForeign('reports_versions_teams_list_team_id_fk');
        });
        Schema::table('revisions', function (Blueprint $table) {
            $table->dropForeign('revisions_users_user_id_fk');
        });
        Schema::table('rss_subscriptions', function (Blueprint $table) {
            $table->dropForeign('rss_subscriptions_feeds_feed_id_fk');
        });
        Schema::table('sent_email_alerts', function (Blueprint $table) {
            $table->dropForeign('sent_email_alerts_dashboards_dashboard_id_fk');
        });
        Schema::table('sent_event_alerts', function (Blueprint $table) {
            $table->dropForeign('sent_event_alerts_users_user_id_fk');
        });
        Schema::table('stakeholders', function (Blueprint $table) {
            $table->dropForeign('stakeholders_users_user_id_fk');
            $table->dropForeign('stakeholders_teams_list_team_id_fk');
        });
        Schema::table('stakeholders_keywords', function (Blueprint $table) {
            $table->dropForeign('stakeholders_keywords_stakeholders_list_id_fk');
        });
        Schema::table('stakeholders_lists', function (Blueprint $table) {
            $table->dropForeign('stakeholders_list_stakeholders_parent_id_fk');
            $table->dropForeign('stakeholders_list_authors_author_id_fk');
            $table->dropForeign('stakeholders_list_stakeholders_data_stakeholders_data_id_fk');
        });
        Schema::table('tagging_taggeds', function (Blueprint $table) {
            $table->dropForeign('tagging_tagged_sent_email_alerts_taggable_id_fk');
        });
        Schema::table('user_doc_requests', function (Blueprint $table) {
            $table->dropForeign('user_doc_requests_users_user_id_fk');
        });
        Schema::table('user_limits', function (Blueprint $table) {
            $table->dropForeign('user_limits_users_user_id_fk');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_teams_list_team_id_fk');
        });
    }
}
