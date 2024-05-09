@echo off
echo This is the production script.

REM delete folder
rmdir /s /q public\storage
rmdir /s /q public\themes
rmdir /s /q public\plugins

