#!/usr/bin/env bash
export TAG=$1

docker-compose -f docker-compose.dev.yml up -d --build --always-recreate-deps