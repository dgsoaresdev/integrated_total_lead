<?php
/**
 * Plugin Name: Integrated Total Lead
 * Description: It integrates the collection and/or registration of site user data with other applications (eg CRM, E-mail Mkt, etc.).
 * Plugin URI: https://diogosoars.com.br
 * Author: Diogo Soares | HAWS / I9ME
 * Author URI: https://diogosoars.com.br
 * Version: 1.0
 * License: MTI
 */

 /*
 //==============================
 // DOC
 //==============================

I'm starting to develop a wordpress plugin that aims to solve the biggest need for a website, landing page or virtual store, which is the integration with the business ecosystem.
For this reason I decided to start a plugin project that shares precious data, for example, between an e-commerce and a CRM, mailChimp, ActiveCampain or another stakeholder.

- The application is capable of creating multiple integrations
- Each must have its data source integration defined


//===========================
// Acrchitecture
//==========================

// Do Create Custom Post Type called "dg_integrated_total_lead"
// Do Create post_meta called "source"
// Do Create post_meta called "targets"
// Do Create post_meta called "arrays_targets", for register data from each endpoint target



//==================
// #List Integration - Based in Custom Post Types
//================

- Title
- Source
- Date Created
- Date Last Updated
- Date Last Request (Based in log)

//==================
// #Register Integration
//================

1. Create Integration
-- 1.1 Title
-- 1.2 Source (CF7/NewUser/NewWooCustomer) - one choice
-- 1.3 Targets (Perfex/Agendor/Zoho/Mailchimp/ActiveCampaign/Google spreadsheet)  - multiple choice


2. Save Options:
-- 2.1 Integrations Active
-- 2.2 Fileds of wich integrations
-- 2.2.1 Perfex
-- 2.2.1.1 API
-- 2.2.1.2 URL
-- 2.2.1.3 Source
-- 2.2.1.4 agent
-- 2.2.1 Agendor
-- 2.2.1.1 API
-- 2.2.1.2 URL
-- 2.2.1.3 Source
-- 2.2.1.4 agent
-- 2.2.1 Zoho
-- 2.2.1.1 API
-- 2.2.1.2 URL
-- 2.2.1.3 Source
-- 2.2.1.4 agent
-- 2.2.1 Mailchimp
-- 2.2.1.1 API
-- 2.2.1.2 URL
-- 2.2.1.3 List
-- 2.2.1.4 Segment
-- 2.2.1 ActiveCampaign
-- 2.2.1.1 API
-- 2.2.1.2 URL
-- 2.2.1.3 List
-- 2.2.1.4 Segment
-- 2.2.1 Google spreadsheet
-- 2.2.1.1 API
-- 2.2.1.2 URL
-- 2.2.1.3 File
-- 2.2.1.4 Table
-- 2.2.1.4 Line

3. Merge Fields:
-- 3.1 Perfex
-- 3.1.1 first_name

4. Reuquest endpoints:
-- 4.1 Integrations Active

*/

//===========================
// INCLUDES
//==========================

//=========
// Options
//========

 
 
// Add necessary actions
add_action('admin_menu', 'integrated_total_lead_add_admin_menu');
add_action('admin_init', 'integrated_total_lead_settings_init');


function integrated_total_lead_add_admin_menu() {
    add_options_page('Integrated Total Leadpage Settings', 'Integrated Total Lead', 'manage_options', 'integrated_total_lead', 'integrated_total_lead_options_page');
};

function integrated_total_lead_settings_init() {
    //
}

function integrated_total_lead_options_page() {
    echo '<br>
    <h3>Details example</h3>
    <hr>
    <br>
    <strong>Details</strong>: Example.<br><br>
';
}


//include "inc/post_types.php";
//include "inc/post_meta.php";

