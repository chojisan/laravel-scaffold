import Badge from "../components/bootstrap/Badge";
import BaseAlert from "../components/bootstrap/BaseAlert";
import BaseButton from "../components/bootstrap/BaseButton";
import BaseCheckbox from "../components/bootstrap/BaseCheckbox";
import BaseInput from "../components/bootstrap/BaseInput";
import BaseDropdown from "../components/bootstrap/BaseDropdown";
import BaseNav from "../components/bootstrap/BaseNav";
import BasePagination from "../components/bootstrap/BasePagination";
import BaseProgress from "../components/bootstrap/BaseProgress";
import BaseRadio from "../components/bootstrap/BaseRadio";
import BaseSlider from "../components/bootstrap/BaseSlider";
import BaseSwitch from "../components/bootstrap/BaseSwitch";
import BaseTable from "../components/bootstrap/BaseTable";
import BaseHeader from "../components/bootstrap/BaseHeader";
import Card from "../components/bootstrap/Card";
import StatsCard from "../components/bootstrap/StatsCard";
import Modal from "../components/bootstrap/Modal";
import TabPane from "../components/bootstrap/Tabs/TabPane";
import Tabs from "../components/bootstrap/Tabs/Tabs";

export default {
  install(Vue) {
    Vue.component(Badge.name, Badge);
    Vue.component(BaseAlert.name, BaseAlert);
    Vue.component(BaseButton.name, BaseButton);
    Vue.component(BaseInput.name, BaseInput);
    Vue.component(BaseNav.name, BaseNav);
    Vue.component(BaseDropdown.name, BaseDropdown);
    Vue.component(BaseCheckbox.name, BaseCheckbox);
    Vue.component(BasePagination.name, BasePagination);
    Vue.component(BaseProgress.name, BaseProgress);
    Vue.component(BaseRadio.name, BaseRadio);
    Vue.component(BaseSlider.name, BaseSlider);
    Vue.component(BaseSwitch.name, BaseSwitch);
    Vue.component(BaseTable.name, BaseTable);
    Vue.component(BaseHeader.name, BaseHeader);
    Vue.component(Card.name, Card);
    Vue.component(StatsCard.name, StatsCard);
    Vue.component(Modal.name, Modal);
    Vue.component(TabPane.name, TabPane);
    Vue.component(Tabs.name, Tabs);
  }
};
