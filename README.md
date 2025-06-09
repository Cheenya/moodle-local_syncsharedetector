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
* PHP **7.2** or later
* Capability `local/syncsharedetector:view` for Manager/Teacher roles

## Installation

1. **Download or clone** this repository into your Moodle installation under `local/syncsharedetector`:

   ```bash
   cd /path/to/moodle/local
   git clone https://github.com/Cheenya/moodle-local_syncsharedetector.git syncsharedetector
   ```
2. **Install plugin** via Moodle Admin:

   * **Site administration → Notifications**
   * Confirm installation and database updates
3. **Purge caches**:

   * **Site administration → Development → Purge all caches**

## Configuration

No additional settings are required. The plugin:

* Injects CSS/JS automatically on all pages
* Adds a report under **Site administration → Reports → SyncShare Detector Log**

You may assign `local/syncsharedetector:view` to other roles in **Site administration → Users → Permissions → Define roles**.

## Usage

1. **Run a quiz** as a student—if SyncShare is active, its UI will be hidden and an event logged.
2. **View logs** under **Site administration → Reports → SyncShare Detector Log**.
3. **Columns**: ID, User name, Detection time.

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

* **SyncShare Detector Log**: table of recent detections.
* Planned: date filters, pagination, CSV export.

## Development

Clone repo and set up dev instance:

```bash
cd /path/to/moodle/local
git clone https://github.com/Cheenya/moodle-local_syncsharedetector.git syncsharedetector
```

Enable debugging, purge caches, test in Moodle.

Contributions welcome—open issues or PRs on GitHub.

## License

This plugin is licensed under the **GNU GPL v3**. See [LICENSE](LICENSE) for details.

\====== Russian / Русский ======

# Детектор SyncShare

Плагин Moodle для **обнаружения**, **подавления** и **логирования** использования браузерного расширения SyncShare при прохождении тестов и активностей.

---

## Содержание

1. [Функции](#функции)
2. [Требования](#требования)
3. [Установка](#установка)
4. [Настройка](#настройка)
5. [Использование](#использование)
6. [Поддерживаемые языки](#поддерживаемые-языки)
7. [Отчёты](#отчёты)
8. [Разработка](#разработка)
9. [Лицензия](#лицензия)

---

## Функции

* **Автоматическое подавление** элементов SyncShare (иконка, контекстное меню) через внедряемые CSS и JS.
* **Обнаружение** использования SyncShare по характерным изменениям DOM.
* **Безопасное логирование** событий с привязкой к `userid` и времени.
* **Защита CSRF** через проверку `sesskey`.
* **Многоязычный интерфейс**: EN, RU, ES, FR, DE, ZH.

## Требования

* Moodle **3.2** или выше (тестировалось на 4.4.1+, 5.0.1)
* PHP **7.2** или выше
* Возможность `local/syncsharedetector:view` для ролей менеджер/преподаватель

## Установка

1. **Скачать или клонировать** репозиторий в папку `local/syncsharedetector` вашего Moodle:

   ```bash
   cd /путь/к/moodle/local
   git clone https://github.com/Cheenya/moodle-local_syncsharedetector.git syncsharedetector
   ```
2. **Установить плагин** через админку:

   * **Администрирование сайта → Уведомления**
   * Подтвердить установку и обновления БД
3. **Очистить кэш**:

   * **Администрирование сайта → Разработка → Очистить весь кэш**

## Настройка

Дополнительных настроек нет. Плагин:

* Внедряет CSS/JS автоматически на всех страницах
* Добавляет отчёт **Администрирование сайта → Отчёты → Журнал детектора SyncShare**

При необходимости можно назначить `local/syncsharedetector:view` другим ролям в **Администрирование сайта → Пользователи → Права → Определение ролей**.

## Использование

1. **Запустите тест** как студент — если SyncShare включён, его UI скрывается, и событие фиксируется.
2. **Просмотр логов**: **Администрирование сайта → Отчёты → Журнал детектора SyncShare**.
3. **Колонки**: ID, Имя пользователя, Время обнаружения.

## Поддерживаемые языки

| Язык     | Код | Файл                                  |
| -------- | --- | ------------------------------------- |
| English  | en  | `lang/en/local_syncsharedetector.php` |
| Русский  | ru  | `lang/ru/local_syncsharedetector.php` |
| Español  | es  | `lang/es/local_syncsharedetector.php` |
| Français | fr  | `lang/fr/local_syncsharedetector.php` |
| Deutsch  | de  | `lang/de/local_syncsharedetector.php` |
| 中文       | zh  | `lang/zh/local_syncsharedetector.php` |

## Отчёты

* **Журнал детектора SyncShare**: таблица последних обнаружений.
* В планах: фильтры по дате, пагинация, экспорт в CSV.

## Разработка

Клонируйте репозиторий и настройте dev:

```bash
cd /путь/к/moodle/local
git clone https://github.com/Cheenya/moodle-local_syncsharedetector.git syncsharedetector
```

Включите отладку, очистите кэш и тестируйте плагин.

PR и Issues приветствуются на GitHub!

## Лицензия

Плагин распространяется под **GNU GPL v3**. См. [LICENSE](LICENSE) для подробностей.
