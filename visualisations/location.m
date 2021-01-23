%% define channel ID, API key and data fields
readChannelID = 0000000;
readAPIKey = '';
latField = 5;
lngField = 6;

%% fetch 250 latitude and longitude data points
locData = thingSpeakRead(readChannelID, 'Fields', [latField,lngField], 'NumPoints', 250, 'ReadKey', readAPIKey);

%% standardise and fill missing data using nearest valid data point ie. last entered location
stlatData = standardizeMissing(locData(:, 1), 0);
stlngData = standardizeMissing(locData(:, 2), 0);
fllatData = fillmissing(stlatData,'nearest');
fllngData = fillmissing(stlngData,'nearest');

%% visualize street map and plot path travelled on streets
geoplot(fllatData, fllngData, 'r', 'LineWidth',3, 'Color',[0.6 0 0]);
geobasemap streets;
ax = gca;
ax.ZoomLevel = 17;