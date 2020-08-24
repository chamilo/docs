# Theming via CSS

![](../../.gitbook/assets/images16%20%282%29.png)![](../../.gitbook/assets/images18%20%282%29.png)![](../../.gitbook/assets/images17%20%282%29.png)

Cascading StyleSheets are a formidable tool to « brand » any web portal. Since Chamilo LMS 1.10.0, we have made considerable progress in comparison with earlier versions, in terms of CSS reuse.

Notably, we use the Bootstrap framework \(version 3 in Chamilo &lt; 2.0, then Bootstrap version 4\), which is touted as a « mobile first » framework. This means that, if you extend it nicely \(which took us about 300h of work in total to migrate to\), your web application should respond very well to all kinds of devices dimensions changes.

Chamilo uses the « cascading » concept extensively. For each theme used, we use a common basis and redefine specific elements locally.

