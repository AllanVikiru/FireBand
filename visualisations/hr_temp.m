%% define channel ID, API key and data fields
readChannelID = 000000;
readAPIKey = '';
hrField = ; %% set field to 2
tempField = ; %% set field to 3

%% fetch 250 temperature and relative humidity data points
data = thingSpeakRead(readChannelID,'Fields',[hrField,tempField], 'NumPoints', 250, 'ReadKey',readAPIKey); 

%% standardise and fill missing data using previous non-zero value
sthrData = standardizeMissing(data(:, 1), 0);
sttempData = standardizeMissing(data(:, 2), 0);
flhrData = fillmissing(sthrData,'previous');
fltempData = fillmissing(sttempData,'previous');

%% define scatter plot with preprocessed data
scatter(flhrData,fltempData);
xlabel('Heartrate (bpm)');
ylabel('Temperature (°C)');
legend('Data Points');
grid on;