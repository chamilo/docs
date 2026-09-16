# 管理教室

Chamilo 中的教室按分支（branch）组织：分支是一个物理场所，每个教室恰好属于一个分支。

## 分支

**Rooms > Branches** 用于管理组织的物理场所——一栋建筑、一个校区或一间办公室。分支可以嵌套（一个分支可以拥有子分支），因此可以建模类似“主校区 > A 楼”的结构。

可为分支设置的字段：

* **Title** 和 **Description**
* **Parent branch** — 用于按层级组织分支
* **IP address** — 可选，用于基于网络的识别
* **Latitude / Longitude** — 用于地图定位
* **Download / Upload speed** 和 **Delay** — 可选的网络质量元数据
* **Administrator e-mail, name, and phone** — 该场所管理人员的联系方式

## 教室

**Rooms > Rooms** 用于管理分支内实际可预订的空间——通常是教室或培训室。每个教室必须属于一个分支。

可为教室设置的字段：

* **Title** 和 **Description**
* **Branch** — 该教室所属的分支（必填）
* **Floor number**
* **Capacity** — 必须为正数
* **Geolocation**、**IP address** 和 **IP mask** — 可选的高级字段

每个教室还具有显示其预订情况的“占用”（Occupation）日历视图，以及使用该教室的课程数量。

## 相关内容

若要查找特定时段的空闲教室，而不是浏览列表，请参阅 [教室可用性查找器](room-availability-finder.md)。