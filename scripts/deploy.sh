#!/usr/bin/env bash

set -euo pipefail

# Usage: scripts/deploy.sh [HOST] [REMOTE_DIR] [BRANCH]
# Pull-only deploy: SSH to server and git pull the specified branch.

HOST="${1:-${DEPLOY_HOST:-}}"
REMOTE_DIR="${2:-${DEPLOY_DIR:-}}"
BRANCH="${3:-${DEPLOY_BRANCH:-main}}"

if [[ -z "$HOST" ]]; then
  echo "ERROR: HOST not specified. Pass as first arg or set DEPLOY_HOST." >&2
  exit 1
fi
if [[ -z "$REMOTE_DIR" ]]; then
  echo "ERROR: REMOTE_DIR not specified. Pass as second arg or set DEPLOY_DIR." >&2
  exit 1
fi

echo "Pulling latest '$BRANCH' on $HOST:$REMOTE_DIR"

ssh -o BatchMode=yes -o StrictHostKeyChecking=accept-new "$HOST" 'bash -s' -- "$REMOTE_DIR" "$BRANCH" <<'REMOTE_SCRIPT'
set -euo pipefail
REMOTE_DIR="$1"
BRANCH="${2:-main}"

# Expand leading ~ on remote
if [[ "$REMOTE_DIR" == ~/* ]]; then
  RDIR="$HOME/${REMOTE_DIR#~/}"
else
  RDIR="$REMOTE_DIR"
fi

if [[ ! -d "$RDIR" ]]; then
  echo "ERROR: Remote directory '$RDIR' does not exist." >&2
  exit 1
fi
cd "$RDIR"

if [[ ! -d .git ]]; then
  echo "ERROR: '$RDIR' is not a git repository." >&2
  exit 1
fi

echo "Fetching..." && git fetch --prune
echo "Checking out '$BRANCH'..." && git checkout "$BRANCH"
echo "Pulling..." && git pull --ff-only origin "$BRANCH"
echo "Done."
REMOTE_SCRIPT


