#! /usr/bin/env bash

git subsplit init git@192.168.88.211:appkr/subsplit-test.git
git subsplit publish --heads="master" --no-tags Animal:git@192.168.88.211:appkr/subsplit-sub-project.git
rm -rf .subsplit/
