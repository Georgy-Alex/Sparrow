<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test_word' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dHUD{T-~pINmcq 9Y7q$J8rTrH}d >pOG;9(lzj&+Ti3:O7a ,,Z]zY+TakiC}:i' );
define( 'SECURE_AUTH_KEY',  'Jd<oK|PTDb(ZgQ<-Y 0!QUzPit{Se|l8PI`RW(GTs^JI=2$nHRZZ_A>Ue`%.oYQh' );
define( 'LOGGED_IN_KEY',    'cy|=$f7rv]A]ePiQu>J;i6`)[LLRH _K]d*I[<<KTGyW$k-z(hH*PoM8dT_q^N6U' );
define( 'NONCE_KEY',        '>83J#ett1fxdR1y:sd,ig.@}nHIA(vO6cn?JmXul*>9kUc#e<J;OxE~3E[F[`S@u' );
define( 'AUTH_SALT',        '%Q:q5|W^pa@Td<J(v|`xilxDDS)#:_RXTT?fFOw=fa* !^v]F68:_AGtT8bd/-=y' );
define( 'SECURE_AUTH_SALT', '<>_/ib^u`&H23D:OpI#~#C)^4{HNmqA`z^#c(orD]i%(<QeWv5?tiNA_im)Ss1=Y' );
define( 'LOGGED_IN_SALT',   't;kCiH|m+;y(vvH3k[Y*qm.I`b&Krf[w6JyEw{#j=8:E*U:P+03TCg~*npur{ziA' );
define( 'NONCE_SALT',       'Fj~i]uQByV0B: w9%{wpT/ 1 s*Hq(rb+|0hC<Kwlnf&@q6z~oa(U-PB^yrS{k!U' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
