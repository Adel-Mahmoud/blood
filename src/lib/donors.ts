import { Donor } from "./types";
import { db, auth } from "./firebase";
import {
  doc,
  setDoc,
  getDoc,
  Timestamp,
  getDocFromCache,
  getDocFromServer,
} from "firebase/firestore";

export const addDonor = async (donor: any) => {
  const user = auth.currentUser;

  if (!user) {
    throw new Error("User not logged in");
  }

  const donorRef = doc(db, "donors", user.uid);

  const existing = await getDoc(donorRef);

  const data = {
    ...donor,
    userId: user.uid,
    email: user.email,
    photo: user.photoURL,
    updatedAt: Timestamp.now(),
    createdAt: existing.exists()
      ? existing.data().createdAt
      : Timestamp.now(),
  };

  await setDoc(donorRef, data);
};

export const getMyDonor = async (): Promise<Donor | null> => {
  const user = auth.currentUser;

  if (!user) return null;

  const donorRef = doc(db, "donors", user.uid);
  const snap = await getDoc(donorRef);

  return snap.exists() ? (snap.data() as Donor) : null;
};