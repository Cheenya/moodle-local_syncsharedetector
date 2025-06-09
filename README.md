# SyncShare Detector

Moodle plugin to **detect**, **suppress**, and **log** usage of the SyncShare browser extension during quizzes and activities.

---

## Table of Contents

1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Configuration](#configuration)
5. [Usage](#usage)
6. [Supported Languages](#supported-languages)
7. [Reporting](#reporting)
8. [Development](#development)
9. [License](#license)

---

## Features

* **Automatic suppression** of SyncShare UI elements (magic icon, context menus) via injected CSS and JS.
* **Detection** of SyncShare usage by monitoring characteristic DOM changes.
* **Secure logging** of detected events linked to authenticated user IDs and timestamps.
* **CSRF protection** through `sesskey` validation.
* **Multilingual interface** supporting EN, RU, ES, FR, DE, ZH.

## Requirements

* Moodle **3.2** or later (tested on 4.4.1+, 5.0.1)
* PHP 7.2 or later
* Moodle capability `local/syncsharedetector:view` assigned to Manager/Teacher roles

## Installation

1. **Download or clone** this repository into your Moodle installation under `local/syncsharedetector`:

   ```bash
   cd /path/to/moodle/local
   git clone https://github.com/Cheenya/moodle-local_syncsharedetector.git syncsharedetector
   ```
2. **Install plugin** via Moodle Admin:

   * Navigate to **Site administration → Notifications**.
   * Confirm installation and database updates.
3. **Purge caches**:

   * Go to **Site administration → Development → Purge all caches**.

## Configuration

No additional settings are required out-of-the-box. The plugin:

* Automatically injects CSS/JS on all pages.
* Adds a new report under **Site administration → Reports → SyncShare Detector Log**.

If desired, you can assign the capability `local/syncsharedetector:view` to other roles in **Site administration → Users → Permissions → Define roles**.

## Usage

1. **Run a quiz** as a student—if SyncShare is active on the client side, its UI will be hidden, and an event logged.
2. **View logs**:

   * Administrators/Teachers: **Site administration → Reports → SyncShare Detector Log**.
   * See columns: **ID**, **User name**, **Detection time**.
3. **Analyze or export** entries as needed (CSV export coming soon).

## Supported Languages

| Language | Code | File                                  |
| -------- | ---- | ------------------------------------- |
| English  | en   | `lang/en/local_syncsharedetector.php` |
| Russian  | ru   | `lang/ru/local_syncsharedetector.php` |
| Spanish  | es   | `lang/es/local_syncsharedetector.php` |
| French   | fr   | `lang/fr/local_syncsharedetector.php` |
| German   | de   | `lang/de/local_syncsharedetector.php` |
| Chinese  | zh   | `lang/zh/local_syncsharedetector.php` |

## Reporting

* **SyncShare Detector Log**: a flexible table showing recent detections.
* Planned enhancements: date filtering, pagination, CSV export.

## Development

Clone the repo and set up a development instance:

```bash
# Clone into local directory
cd /path/to/moodle/local
git clone https://github.com/Cheenya/moodle-local_syncsharedetector.git syncsharedetector

# Enable debugging, purge caches, and access the plugin in Moodle.
```

Contributions welcome! Please open issues or pull requests on GitHub.

## License

This plugin is licensed under the **GNU General Public License v3**. See [LICENSE](LICENSE) for details.
