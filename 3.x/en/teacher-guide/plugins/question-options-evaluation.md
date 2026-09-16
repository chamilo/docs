# Question Options Evaluation

Question Options Evaluation <img src="/.gitbook/assets/icons/mdi-calculator-variant.svg" alt="Question Options Evaluation" data-size="line"> lets you apply a negative-marking (penalty) formula to a test's scoring, instead of Chamilo's default behavior of simply summing correct answers.

## Setting a Formula

Once enabled, an extra icon appears next to each test in the course's **Tests** tool list. Clicking it opens a small form where you choose one of:

* **No formula** — Chamilo's normal scoring (default)
* **Recalculate question scores** — Redistributes option weighting without a penalty
* **Successes − Failures**
* **Successes − Failures / 2**
* **Successes − Failures / 3**

The chosen formula applies only to that specific test.

> This setting does not change the question or answer weights themselves — it changes how the final score is computed. If the plugin is disabled, or no formula is selected, Chamilo falls back to its original scoring.

## Tips

* **Test on a copy first** — Changing a formula can change the scores students end up with on that test; try it on a duplicate test before applying it to a live one
* **Explain the change to students** — A penalty formula can be surprising if learners are used to simple correct-answer scoring; mention it in your instructions
