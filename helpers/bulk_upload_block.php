<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2011 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class bulk_upload_block {
  static function get_site_list() {
    return array(
      "bulk_upload_site" => t("bulk_upload Sidebar Block"));
  }

  static function get_admin_list() {
    return array(
      "bulk_upload_admin" => t("bulk_upload Dashboard Block"));
  }

  static function get($block_id, $theme) {
    $block = new Block();
    switch ($block_id) {
    case "bulk_upload_admin":
      $block->css_id = "g-bulk_upload-admin";
      $block->title = t("bulk_upload Dashboard Block");
      $block->content = new View("admin_bulk_upload_block.html");

      $block->content->item = ORM::factory("item", 1);
      break;
    case "bulk_upload_site":
      $block->css_id = "g-bulk_upload-site";
      $block->title = t("bulk_upload Sidebar Block");
      $block->content = new View("bulk_upload_block.html");

      $block->content->item = ORM::factory("item", 1);
      break;
    }
    return $block;
  }
}
