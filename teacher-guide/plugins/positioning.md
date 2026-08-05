# Positioning

Positioning <img src="/.gitbook/assets/icons/mdi-radar.svg" alt="Positioning" data-size="line"> adds a before/after self-assessment workflow: pick one test as the **initial test** and another as the **final test** (often a copy of the same test), and Chamilo shows each learner's score change between the two on a radar chart.

## Accessing the Tool

Once enabled, a **Positioning** tool appears on your course homepage. It lists the course's eligible tests with **Select as initial test** / **Select as final test** buttons, a shortcut into each test's results, and the radar chart comparing average initial vs. final scores.

## Which Tests Are Eligible

Only tests that meet all three of these criteria appear as selectable:

* At least 3 question categories
* The test's result-page type is set to **radar**
* Exactly one attempt is allowed

If a test you expect to see is missing from the list, check these three settings on that test first.

## Enforcing the Order

Your administrator can additionally configure, platform-wide:

* **Block other course tools** until the learner has completed the initial test
* An **End test unlock threshold** — a minimum average learning-path completion percentage required before the final test unlocks

## Tips

* **Set up the radar result type early** — Since eligibility depends on test settings made when you build the test, plan for Positioning before you finalize your test's categories and result-page type, not after
* **Use a genuine copy for the final test** — Comparing a test against itself doesn't tell you much; the final test should cover the same categories so the radar chart is meaningful
