# AGENTS.md

This document is for AI agents only. Follow it strictly.

## Non-Negotiable Rules

- Do not change the public API unless explicitly requested.
- Do not add new public functions.
- Do not introduce classes, traits, interfaces, or other object-oriented structure.
- Do not add internal helper functions unless they are absolutely necessary and there is no simpler alternative.
- Do not rename existing functions for style reasons.
- Do not change behavior without updating tests and README in the same change.
- Do not change PHP compatibility without explicit instruction.

## Project Contract

- `array_flatten()` is the only intended public function.
- The function must preserve first-seen order.
- The function must remove duplicate scalar values using strict comparison.
- The package must remain compatible with PHP `^8.0.2`.

## Documentation Rules

- Keep `README.md` aligned with runtime behavior.
- Keep the README concise, technical, and factual.
- If behavior changes, update the README and tests together.
- Do not add marketing language or unnecessary narrative.

## Testing Rules

- Every behavior change must be covered by tests.
- Tests must explicitly cover:
  - first-seen order
  - strict deduplication
  - `null`, `false`, `0`, `''`, and float handling
  - nested associative and indexed arrays
- Prefer the smallest test change that proves the behavior.

## Editing Rules

- Make the smallest possible change that solves the task.
- Preserve existing formatting unless a formatter is being run.
- Prefer direct code over abstraction.
- Avoid introducing new dependencies.
- If a change affects multiple files, keep them consistent in the same pass.

## Verification Rules

- Run PHPUnit after code changes.
- Run syntax checks when PHP files are edited.
- Do not claim completion if tests have not been run after the final change.

## Conflict Rule

- If a user request conflicts with this document, follow the user request.
- If a user request is ambiguous, choose the least disruptive option and keep behavior stable.
