import { Donor } from "./types";

const STORAGE_KEY = "blood_bank_donors";

export function getDonors(): Donor[] {
  const data = localStorage.getItem(STORAGE_KEY);
  return data ? JSON.parse(data) : [];
}

export function addDonor(donor: Omit<Donor, "id" | "createdAt">): Donor {
  const donors = getDonors();
  const newDonor: Donor = {
    ...donor,
    id: crypto.randomUUID(),
    createdAt: new Date().toISOString(),
  };
  donors.push(newDonor);
  localStorage.setItem(STORAGE_KEY, JSON.stringify(donors));
  return newDonor;
}

export function searchDonors(filters: {
  bloodType?: string;
  governorate?: string;
  center?: string;
}): Donor[] {
  let donors = getDonors();
  if (filters.bloodType) {
    donors = donors.filter((d) => d.bloodType === filters.bloodType);
  }
  if (filters.governorate) {
    donors = donors.filter((d) => d.governorate === filters.governorate);
  }
  if (filters.center) {
    donors = donors.filter((d) => d.center === filters.center);
  }
  return donors;
}
