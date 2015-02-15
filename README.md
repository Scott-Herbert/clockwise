# clockwise
Just a repo for Clockwise's CTC3 stuff

## History
Clockwise (choosen because we where the second team to describe our task, going "clockwise" around the room) is a search engion aimed to enable help a neophyte learn a new domain in a short time.
The engion uses meta data to locate orginisations who may help the user in the orginisation of an event (be speakers etc) it then uses a simple one step removed, meta data search to locate other related groups.
The project came about as a result of the Feb-2015 CodeTheCity event.

## Files
\images	- Photos and screens shots of the idears for development
\webfiles - php/html/css files
  \live   - the current live site

## Database requirements

### Tables needed

1. item
```SQL
CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `JSON` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
2. meta
```SQL
CREATE TABLE `meta` (
  `meta_id` int(11) NOT NULL,
  `meta_desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
3. meta_link
```SQL
CREATE TABLE `meta_link` (
  `item_id` int(11) DEFAULT NULL,
  `meta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

### Stored Procedures Needed

1. None

### PHP settings needed

1. The file /webfiles/live/inc/settings.php will need amending.

### Data

1. 20150204CareDataFields.xlsx - Meta data about the fields used
2. 20150204CareDataCategories.xlsx - Meta data about the fields used
3. 20150302CareData.xlsx - the raw data  __Only this file is currently user__
