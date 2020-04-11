<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" />
        <title>DEV box ⚙️ boot up and hit the keyboard</title>
        <link rel="icon"
            href="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/emojione/211/alien-monster_1f47e.png">
        <style>
        .spacing {
            padding-top: 1.5em;
            padding-bottom: 1.5em;
        }

        .height-limit {
            overflow-y: scroll;
            height: 600px;
        }
        </style>
    </head>

    <body>
        <section class="hero is-fullheight is-info is-bold">
            <div class="hero-body has-text-centered">
                <div class="container">
                    <h1 class="title is-size-1">
                        ⚙️<br />
                        dev.box
                    </h1>
                    <h2 class="subtitle">
                        A simple Docker LEMP
                    </h2>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <h1 class="title">PHP Settings</h1>
                <h2 class="subtitle">
                    Details about PHP
                </h2>
            </div>
            <div class="container spacing">
                <div class="height-limit">
                    <table class="table is-fullwidth is-bordered is-striped is-hoverable">
                        <tr>
                            <th>
                                <span>📦</span>
                                Feature
                            </th>
                            <th>
                                <span>⏰</span>
                                Version
                            </th>
                            <th class="has-text-right">
                                <span>👍</span>
                                Working?
                            </th>
                        </tr>
                        <tr>
                            <td><strong>PHP</strong></td>
                            <td>
                                <div class="tags has-addons">
                                    <span class="tag is-dark">Version</span>
                                    <span class="tag is-info"><?= phpversion(); ?></span>
                                </div>
                            </td>
                            <td class="has-text-right">✔</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Modules</strong></td>
                        </tr>
                        <?php
                    $modules = get_loaded_extensions();
                    asort($modules);
                    foreach ($modules as $extension) :
                    ?>
                        <tr>
                            <td colspan="2"><?php echo $extension; ?></td>
                            <td class="has-text-right">✔</td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <h1 class="title">Database choices</h1>
                <h2 class="subtitle">
                    There are few Database options preinstalled for you
                </h2>
            </div>
            <div class="container spacing">
                <table class="table is-fullwidth is-bordered is-hoverable">
                    <tr>
                        <th colspan="3">
                            MySQL
                        </th>
                    </tr>
                    <?php
                        $mysql_exists = false;
                        if (extension_loaded('mysql') or extension_loaded('mysqli')) :
                            $mysql_exists = true;
                        endif;
                        $mysqli = new mysqli('mysql.devbox', getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
                        $mysql_running = true;
                        if (mysqli_connect_errno()) {
                            $mysql_running = false;
                        } else {
                            $mysql_version = $mysqli->server_info;
                        }

                        $mysqli->close();
                        ?>
                    <tr>
                        <td>Version</td>
                        <td class="has-text-right">
                            <div class="tags has-addons is-pulled-right">
                                <span class="tag is-dark">Version</span>
                                <span class="tag is-info"><?= ($mysql_running ? $mysql_version : 'Nope'); ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Connected?</strong></td>
                        <td class="has-text-right">
                            <?= ($mysql_running ? '✅' : '❌'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Hostname</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="mysql.devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Port</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="<?=getenv('HOST_PORT_MYSQL'); ?>"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Username</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="<?=getenv('MYSQL_USER'); ?>"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Password</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="<?=getenv('MYSQL_PASSWORD'); ?>"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Database</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="<?=getenv('MYSQL_DATABASE'); ?>"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container spacing">
                <table class="table is-fullwidth is-bordered is-hoverable">
                    <tr>
                        <th colspan="3">
                            PostgreSQL
                        </th>
                    </tr>
                    <?php
                    $psql_is_connected = false;
                    $psql_conn = new PDO('pgsql:host=pgsql.devbox;port=5432;dbname=devbox;user=devbox;password=devbox');
                    if ($psql_conn) {
                        $psql_is_connected = true;
                    }
                    $psql_version = $psql_conn->getAttribute(PDO::ATTR_SERVER_VERSION);

                    ?>
                    <tr>
                        <td>Version</td>
                        <td class="has-text-right">
                            <div class="tags has-addons is-pulled-right">
                                <span class="tag is-dark">Version</span>
                                <span class="tag is-info"><?= ($psql_is_connected ? $psql_version : 'Nope'); ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Connected?</strong></td>
                        <td class="has-text-right">
                            <?= ($psql_is_connected ? '✅' : '❌'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Hostname</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="pgsql.devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Port</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="5432" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Username</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Password</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Database</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container spacing">
                <table class="table is-fullwidth is-bordered is-hoverable">
                    <tr>
                        <th colspan="3">
                            MongoDB
                        </th>
                    </tr>
                    <?php
                    $mongodb_is_connected = false;
                    if (extension_loaded('mongodb')) :
                        $mongodb = new MongoDB\Driver\Manager('mongodb://mongo.devbox:27017/');
                        if ($mongodb) {
                            $mongodb_is_connected = true;
                        }
                    endif;
                    ?>
                    <tr>
                        <td>Version</td>
                        <td class="has-text-right">
                            <div class="tags has-addons is-pulled-right">
                                <span class="tag is-dark">Version</span>
                                <span class="tag is-info">4.2.5</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Connected?</strong></td>
                        <td class="has-text-right">
                            <?= ($mongodb_is_connected ? '✅' : '❌'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Hostname</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="mongo.devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Port</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="27017" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <h1 class="title">Caching</h1>
                <h2 class="subtitle">
                    For better performance!
                </h2>
            </div>
            <div class="container spacing">
                <table class="table is-fullwidth is-bordered is-hoverable">
                    <tr>
                        <th colspan="3">
                            <h3>Redis</h3>
                        </th>
                    </tr>
                    <tr>
                        <?php
                    $redis = new Redis();
                    $redis->connect('redis.devbox', getenv('HOST_PORT_REDIS'));
                    ?>
                        <td><strong>Connected?</strong></td>
                        <td class="has-text-right">
                            <?= ($redis->ping() ? '✅' : '❌'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Version</td>
                        <td class="has-text-right">
                            <div class="tags has-addons is-pulled-right">
                                <span class="tag is-dark">Version</span>
                                <span
                                    class="tag is-info"><?= ($redis->ping() ? $redis->info('SERVER')['redis_version'] : 'Nope'); ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Hostname</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="redis.devbox" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label is-normal">
                                    <label class="label">Port</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" value="<?=getenv('HOST_PORT_REDIS'); ?>"
                                                readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <h1 class="title">Mailing</h1>
                <h2 class="subtitle">
                    Need to test emails?
                </h2>
            </div>
            <div class="container spacing">
                <table class="table is-fullwidth is-bordered is-hoverable">
                    <tr colspan="3">
                        <th colspan="2">
                            Mailhog
                        </th>
                    </tr>
                    <tr>
                        <td>Version</td>
                        <td>
                            <div class="tags has-addons is-pulled-right">
                                <span class="tag is-dark">Version</span>
                                <span class="tag is-info">1.0</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="spacing">
                                <p>Testing emails is easy, simply open the Mailhog interface</p><br />
                                <a class="button is-success" href="//localhost:8025">localhost:8025</a>
                            </div>
                            <pre class="highlight">
    <code>
    &lt;?php
        $msg = 'Email testing locally';
        mail('mail@test.co', 'Test email', $msg);
    ?&gt;
    </code>
</pre>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </body>

    <script type="text/javascript" src="http://localhost:8080/main.js"></script>

</html>