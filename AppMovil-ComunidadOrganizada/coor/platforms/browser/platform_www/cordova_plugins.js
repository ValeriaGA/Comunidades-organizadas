cordova.define('cordova/plugin_list', function(require, exports, module) {
module.exports = [
    {
        "file": "plugins/cordova-sqlite-legacy-build-support/www/SQLitePlugin.js",
        "id": "cordova-sqlite-legacy-build-support.SQLitePlugin",
        "pluginId": "cordova-sqlite-legacy-build-support",
        "clobbers": [
            "SQLitePlugin"
        ]
    },
    {
        "file": "plugins/uk.co.workingedge.cordova.plugin.sqliteporter/www/sqlitePorter.js",
        "id": "uk.co.workingedge.cordova.plugin.sqliteporter.sqlitePorter",
        "pluginId": "uk.co.workingedge.cordova.plugin.sqliteporter",
        "clobbers": [
            "cordova.plugins.sqlitePorter"
        ]
    },
    {
        "file": "plugins/cordova-plugin-sqlite-2/dist/sqlite-plugin.js",
        "id": "cordova-plugin-sqlite-2.sqlitePlugin",
        "pluginId": "cordova-plugin-sqlite-2",
        "clobbers": [
            "sqlitePlugin"
        ]
    }
];
module.exports.metadata = 
// TOP OF METADATA
{
    "cordova-plugin-whitelist": "1.3.3",
    "cordova-sqlite-legacy-build-support": "1.3.5",
    "uk.co.workingedge.cordova.plugin.sqliteporter": "1.1.0",
    "cordova-plugin-sqlite-2": "1.0.4"
}
// BOTTOM OF METADATA
});