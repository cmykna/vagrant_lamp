maintainer        "Chris Cykana"
description       "HMHED setup"
version           "0.1"
recipe            "hmhed", "Set up the HMHED website"

%w{ ubuntu debian }.each do |os|
  supports os
end
