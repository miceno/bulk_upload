<?php defined("SYSPATH") or die("No direct script access.");/**
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
class bulk_upload_Controller extends Controller {
  public function index() {
    print $this->_get_form();
  }

  public function handler() {
    access::verify_csrf();

    $form = $this->_get_form();
    if ($form->validate()) {
      // @todo process the admin form

      message::success(t("bulk_upload Processing Successfully"));

      json::reply(array("result" => "success"));
    } else {
      json::reply(array("result" => "error", "html" => (string)$form));
    }
  }

  private function _get_form() {
    $form = new Forge("bulk_upload/handler", "", "post",
                      array("id" => "g-bulk_upload-form"));
    $group = $form->group("group")->label(t("bulk_upload Handler"));
    $group->input("text")->label(t("Text"))->rules("required");
    $group->submit("submit")->value(t("Submit"));

    return $form;
  }
}
