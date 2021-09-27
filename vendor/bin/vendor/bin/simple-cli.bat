@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../simple-cli/simple-cli/bin/simple-cli
php "%BIN_TARGET%" %*
