@echo off
if "%1" == "" (
	echo. && echo.
	echo *   GET Environment Variables "GruntBuildPath"   *
	goto check_ENV_GruntBuildPath
) else (	
	set gruntPath=%1
	goto checkPath
)

REM check_ENV_GruntBuildPath()
:check_ENV_GruntBuildPath
if defined GruntBuildPath (
	 set gruntPath=%GruntBuildPath%
	 goto checkPath
)else (
	echo. && echo. && echo.
	echo **************************** Path not valid/missing *****************************
    echo *     Correct the path or define "GruntBuildPath" as a environment variable     *  
    echo. && echo.
    GOTO :EOF
)

REM checkPath()
:checkPath
if not exist %gruntPath%\js\node_modules (
	 echo. && echo. && echo.
	 echo *************************** BuildPath not valid *****************************
	 echo *   Correct the path or define "GruntBuildPath" as a environment variable   *  
	 echo *   Correct BuildPath : [BuildPath]\js\node_modules
	 echo *   Current BuildPath : %gruntPath%
	 echo. && echo.
	 EXIT /B
)else (
	goto BuildGrunt
)

REM BuildGrunt()
:BuildGrunt
echo. && echo. && echo.
echo *   %gruntPath%   *
echo. && echo. && echo.

xcopy "../vendor" "%gruntPath%\vendor\" /s /e /y
xcopy "./lib" "%gruntPath%\js\lib\" /s /e /y
xcopy "./app" "%gruntPath%\js\app\" /s /e /y
copy "./*.js" "%gruntPath%\js\" /y

call grunt --gruntfile "%gruntPath%\js\gruntfile.js"

copy "%gruntPath%\js\*.js" "*"

RMDIR "%gruntPath%\vendor\" /S /Q
RMDIR "%gruntPath%\js\lib\" /S /Q
RMDIR "%gruntPath%\js\app\" /S /Q
DEL "%gruntPath%\js\*.js"
