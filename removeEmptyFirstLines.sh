#!/usr/bin/env bash
# StoneAge IT
# Author: Patrick Huber (patrick.huber@stoneageit.ch)
set -e
set -o pipefail

declare -a fileListArray
while IFS='' read -r line; do fileListArray+=("$line"); done < <(find "." -iname "*.md" -type f)

# echo "fileListArray: ${fileListArray[*]}"
for file in "${fileListArray[@]}"; do

    printf "[%s]: " "${file}"

    if head -1 "${file}" | grep -qE '^$'; then
        sed -i '' -e 1d "${file}"
        printf "OK\n"
    else
        printf "NOT EMPTY\n"
    fi

done
