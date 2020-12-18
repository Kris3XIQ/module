#!/usr/bin/env bash
#
# Installation file for the module
#
# Automatic bash script for easy installation.
# How to:
# Stand in the root directory of your ANAX installation
# and run:
# bash vendor/kris3xiq/weatherservice/install.bash
#

# Copy over the essential files from vendor to the ANAX installation
rsync -av vendor/kris3xiq/weatherservice/src ./
rsync -av vendor/kris3xiq/weatherservice/view ./
rsync -av vendor/kris3xiq/weatherservice/config ./

# Copy over the test cases for the module
rsync -av vendor/kris3xiq/weatherservice/test ./
