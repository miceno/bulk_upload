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
class bulk_upload_event {
  static function site_menu($menu, $theme) {

      $item = $theme->item();

      if ($item && $item->is_album() && access::can("edit", $item)) {
        $menu->get("options_menu")
          ->append(Menu::factory("dialog")
                   ->id("bulk_upload")
                   ->label(t("Bulk upload"))
                   ->url(url::site("bulk_upload")));
      }
  }

  static function context_menu($menu, $theme, $item) {
    if (access::can("edit", $item)) {
      if ($item->is_album()) {
        $menu->get("options_menu")
          ->append(Menu::factory("dialog")
                   ->id("bulk_upload")
                   ->label(t("Bulk upload"))
                   ->css_class("ui-icon-folder-open g-organize-link")
                   ->url(url::site("bulk_upload")));
      }
    }
  }

}
